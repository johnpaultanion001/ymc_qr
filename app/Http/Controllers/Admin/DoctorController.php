<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\DayDoctor;
use App\Models\TimeDoctor;
use App\Models\Service;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Appointment;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotification;
use Carbon\Carbon;


class DoctorController extends Controller
{
   
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            $doctors = Doctor::latest()->get();
            $services = Service::latest()->get();
            return view('admin.doctors', compact('doctors','services'));
        }
        return abort('403');
    }

    public function account(){
        $services = Service::latest()->get();
        return view('doctor.account', compact('services'));
    }

    public function finder_doctor(){
        $doctors = Doctor::latest()->get();
        $services = Service::latest()->get();
        return view('patient.finder_doctor', compact('doctors','services'));
    }

   
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required','unique:users'],
            'contact_number' => ['required','unique:users'],
            'password' => ['required'],
            'doctor_name' => ['required'],
            'services' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        if($request->input('days') == null){
            return response()->json(['no_selected' => 'At least one check box must be selected.']);
        }
   

        $doctor_account = User::create([
                            'name' => $request->input('name'),
                            'email' => $request->input('email'),
                            'contact_number' => $request->input('contact_number'),
                            'password' => Hash::make($request->input('password')),

                            'role' => 'doctor',
                        ]);
        $doctor = Doctor::create([
            'user_id' => $doctor_account->id,
            'service_id' => $request->input('services'),
            'name' => $request->input('doctor_name'),
        ]);      
       
        foreach($request->input('days') as $day )
        {
            DayDoctor::updateOrCreate(
                [
                    'doctor_id'    => $doctor->id,
                    'day'          => $day,
                ],
                [
                    'doctor_id'    => $doctor->id,
                    'day'          => $day,
                ]
            );
        }

        foreach($request->input('time') as $time )
        {
            TimeDoctor::updateOrCreate(
                [
                    'doctor_id'    => $doctor->id,
                    'time'          => $time,
                ],
                [
                    'doctor_id'    => $doctor->id,
                    'time'          => $time,
                ]
            );
        }


        return response()->json(['success' => 'Successfully Added Record.']);
        

    }
  
    public function edit(User $doctor)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $doctor]);
        }
    }

  
    public function update(Request $request, Doctor $doctor)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' .$doctor->user->id,],
            'contact_number' => ['required', 'unique:users,contact_number,' .$doctor->user->id,],
            'doctor_name' => ['required'],
            'services' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        if($request->input('days') == null){
            return response()->json(['no_selected' => 'At least one check box must be selected.']);
        }

        User::find($doctor->user->id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_number' => $request->input('contact_number'),
            'password' => Hash::make($request->input('password')),
        ]);

        Doctor::find($doctor->id)->update([
            'service_id' => $request->input('services'),
            'name' => $request->input('doctor_name'),
        ]);

        DayDoctor::where('doctor_id', $doctor->id)
                        ->whereNotIn('day', $request->input('days'))
                        ->delete();
        TimeDoctor::where('doctor_id', $doctor->id)
                        ->whereNotIn('time', $request->input('time'))
                        ->delete();

        foreach($request->input('days') as $day )
        {
            DayDoctor::updateOrCreate(
                [
                    'doctor_id'    => $doctor->id,
                    'day'          => $day,
                ],
                [
                    'doctor_id'    => $doctor->id,
                    'day'          => $day,
                ]
            );
        }
        foreach($request->input('time') as $time )
        {
            TimeDoctor::updateOrCreate(
                [
                    'doctor_id'    => $doctor->id,
                    'time'          => $time,
                ],
                [
                    'doctor_id'    => $doctor->id,
                    'time'          => $time,
                ]
            );
        }

        return response()->json(['success' => 'Successfully Updated Record.']);

    }

    public function update_account(Request $request, User $user){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' .$user->id,],
            'contact_number' => ['required', 'unique:users,contact_number,' .$user->id,],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($user->id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_number' => $request->input('contact_number'),
            'password' => Hash::make($request->input('password')),
        ]);
        return response()->json(['success' => 'Successfully Updated Record.']);
    }

   


    public function accept_appointment(){
        $userrole = auth()->user()->role;
        if($userrole == 'doctor'){
            $appointments = Appointment::where('doctor_id', auth()->user()->doctor->id)->where('isMove', 0)->latest()->get();
            return view('doctor.appointment', compact('appointments'));
        }
        return abort('403');
    }

    public function available(Request $request){
        $appointment_id = $request->get('id');

        $appointment = Appointment::where('id', $appointment_id)->first();

        $doctors_list = Doctor::where('service_id', $appointment->service->id)->where('isAvailable', 1)->latest()->get();

        foreach($doctors_list as $doctor){
            $doctors[] = array(
                'id'           => $doctor->id,
                'name'        => $doctor->name, 
            );
        }
        return response()->json([
            'doctors'  => $doctors ?? '',
        ]);

    }

    public function complete(Request $request){
        date_default_timezone_set('Asia/Manila');
        $appointment1 = Appointment::where('id',$request->get('id'))->first();

        $emailNotif = [
            'notif_message'     => '',
            'service'           =>  $appointment1->service->name,
            'ref_number'        =>  $appointment1->ref_number,
            'date_and_time'     =>  Carbon::parse($appointment1->date)->isoFormat('MMM Do YYYY') .'at'. $appointment1->time,
            'name'              =>  $appointment1->user->name,
            'msg'               =>  '',
        ];

        if($request->get('status') == 'COMPLETED'){
            $emailNotif['notif_message']  = 'The appointment you requested has been completed.';
        }
        if($request->get('status') == 'FAILED'){
            $emailNotif['notif_message']  = 'The appointment you requested has been failed.';
        }
        


        Mail::to($appointment1->user->email)
            ->send(new EmailNotification($emailNotif));

        Appointment::find($appointment1->id)->update([
            'status' => $request->get('status'),
        ]);

        ActivityLog::create([
            'activity'  => 'Activity: Change Status to <br> '.$request->get('status').
                           'Appointment ID: '.$appointment1->id .'<br>
                            User: '. auth()->user()->name,
        ]);

        return response()->json(['success' => 'Successfully '. $request->get('status')]);
    }
}
