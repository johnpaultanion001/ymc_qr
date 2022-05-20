<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\Service;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;



class AppointmentController extends Controller
{
    public function index()
    {
        $userid = auth()->user()->id;
        $appointments = Appointment::where('user_id', $userid)->where('isMove', '0')->latest()->get();
        $services = Service::latest()->get();

        return view('patient.appointments', compact('appointments','services'));
    }

  
    public function create()
    {
        //
    }
    public function category_services(Request $request)
    {
        $category = $request->get('category');

        $servicess = Service::where('category', $category)->latest()->get();

        foreach($servicess as $service){
            $services[] = array(
                'id'           => $service->id,
                'name'        => $service->name, 
            );
        }
        return response()->json([
            'services'  => $services ?? '',
        ]);

    }
    
   
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'date' => ['required','after:today', 'date'],
            'time' => ['required'],
            'service_id' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $userid = auth()->user()->id;
        $username = auth()->user()->name;
        
        $onepending = Appointment::where('user_id', $userid)
                                        ->where('status', 'PENDING')
                                        ->where('isMove', '0')
                                        ->get()
                                        ->count();

        $pending_approved_app = Appointment::whereIn('status', ['PENDING','APPROVED'])
                                ->where('date', $request->input('date'))
                                ->where('time', $request->input('time'))
                                ->where('service_id', $request->input('service_id'))
                                ->where('isMove', '0')
                                ->get()
                                ->count();  

        $pending_approved =  $pending_approved_app + 1;

        $doctor_service_available = Doctor::where('service_id', $request->input('service_id'))
                                            ->get()
                                            ->count(); 

        if($onepending > 0){
            return response()->json(['onepending' => 'You have already Pending Record, Wait for admin response']);
        }
        if($doctor_service_available < $pending_approved){
            return response()->json(['onemin' => 'No doctors available on this date and time.']);
        }

        $noofficetime = array("12:00 AM", "1:00 AM" ,"2:00 AM" ,"3:00 AM","4:00 AM" ,"5:00 AM","6:00 AM" ,"7:00 AM","8:00 AM" 
                                ,"5:00 PM","6:00 PM","7:00 PM","8:00 PM","9:00 PM","10:00 PM","11:00 PM"); 

        if (in_array($request->time, $noofficetime))
        {
            return response()->json(['noofficetime' => 'The Hospital open time are 9:00 AM TO 5:00 PM']);
        }

        
        $doctors = Doctor::where('service_id', $request->input('service_id'))->latest()->get();

        $days = \Carbon\Carbon::createFromFormat('Y-m-d',$request->input('date'))->format('D');

        foreach($doctors as $doc){
            $avail_day[] = $doc->days()->pluck('day')->toArray();
            $time_day[] = $doc->times()->pluck('time')->toArray();

        }
        $a_days = collect($avail_day)->flatten(1)->toArray();
        $a_times = collect($time_day)->flatten(1)->toArray();


        if (!in_array($days, $a_days ?? '')) {
            return response()->json(['date' => 'No doctors available on this date.']);
        }
        if (!in_array($request->input('time'), $a_times ?? '')) {
            return response()->json(['time' => 'No doctors available on this time.']);
        }

        
        Appointment::create([
            'user_id' => $userid,
            'service_id' => $request->input('service_id'),
            'ref_number' => 'RPH-'.substr(time(), 4).auth()->user()->id,
            'note' => $request->input('note'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        Notification::create([
            'user_id' => 1,
            'status' => "Added appointment by " .$username,
            'link' => "/admin/appointment",
        ]);

        return response()->json(['success' => 'Added Successfully.']);
    }
    public function validation_of_date_time(Request $request)
    {
        $service = $request->get('service');
        $date = $request->get('date');
        $time = $request->get('time');

        $pending_approved_app = Appointment::whereIn('status', ['PENDING','APPROVED'])
                                        ->where('date', $date)
                                        ->where('time', $time)
                                        ->where('service_id', $service)
                                        ->where('isMove', '0')
                                        ->get()
                                        ->count();  

        $pending_approved =  $pending_approved_app + 1;

        $doctor_service_available = Doctor::where('service_id', $service)
                                            ->get()
                                            ->count(); 


        if($doctor_service_available < $pending_approved){
            return response()->json(['onemin' => 'No doctors available on this date and time.']);
        }

        $doctors = Doctor::where('service_id', $service)->latest()->get();

        $days = \Carbon\Carbon::createFromFormat('Y-m-d',$date)->format('D');

        foreach($doctors as $doc){
           $avail_day[] = $doc->days()->pluck('day')->toArray();
           $time_day[] = $doc->times()->pluck('time')->toArray();

        }
        $a_days = collect($avail_day)->flatten(1)->toArray();
        $a_times = collect($time_day)->flatten(1)->toArray();


        if (!in_array($days, $a_days)) {
            return response()->json(['date' => 'No doctors available on this date.']);
        }
        if (!in_array($time, $a_times)) {
            return response()->json(['time' => 'No doctors available on this time.']);
        }
 
    }
    

   
    public function show(Appointment $appointment)
    {
        //
    }

   
    public function edit(Appointment $appointment)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $appointment]);
        }
    }

    
    public function update(Request $request, Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'date' => ['required','after:today'],
            'time' => ['required'],
            'service_id' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
  
        $userid = auth()->user()->id;
        $username = auth()->user()->name;

       
        $noofficetime = array("12:00 AM", "1:00 AM" ,"2:00 AM" ,"3:00 AM","4:00 AM" ,"5:00 AM","6:00 AM" ,"7:00 AM","8:00 AM" 
            ,"5:00 PM","6:00 PM","7:00 PM","8:00 PM","9:00 PM","10:00 PM","11:00 PM"); 

        if (in_array($request->time, $noofficetime))
        {
            return response()->json(['noofficetime' => 'The Hospital open time are 9:00 AM TO 5:00 PM']);
        }


        Appointment::find($appointment->id)->update([
            'service_id' => $request->input('service_id'),
            'note' => $request->input('note'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function destroy(Appointment $appointment)
    {
        Appointment::find($appointment->id)->update([
            'isMove'        => 1,
            'status'        => 'CANCELLED',
        ]);
        return response()->json(['success' => 'Cancelled Successfully.']);



    }

    public function validation_day_time(Request $request){
        $day = $request->get('date');
        $service_id = $request->get('service');

        $doctors = Doctor::where('service_id', $service_id)->latest()->first();

        $days = \Carbon\Carbon::createFromFormat('Y-m-d',$day)->format('D');

        $avail_day  = $doctors->days()->get()->pluck('day')->toArray();

        if (!in_array($days, $avail_day))
        {
            return response()->json(['success' => 'The Hospital open time are 9:00 AM TO 5:00 PM']);
        }   
        
    }
}
