<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;



class AppointmentController extends Controller
{
    public function index()
    {
        $userid = auth()->user()->id;
        $appointments = Appointment::where('user_id', $userid)->latest()->get();
        $services = Service::latest()->get();

        return view('patient.appointments', compact('appointments','services'));
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
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
        
        $onepending = Appointment::where('user_id', $userid)
                                        ->where('status', 'PENDING')
                                        ->get()->count();

        $mins = Appointment::where('status', 'PENDING')
                                ->where('date', $request->input('date'))
                                ->where('time', $request->input('time'))
                                ->where('service_id', $request->input('service_id'))
                                ->get()->count();

        $slots = Service::where('id', $request->input('service_id'))->first();
        $appointment_slots = appointment::where('status', 'PENDING')
                                            ->where('service_id', $request->input('service_id'))
                                            ->where('date', $request->input('date'))
                                            ->count();


        if($onepending > 0){
            return response()->json(['onepending' => 'You have already Pending Record, Wait for admin response']);
        }
        if($mins > 0){
            return response()->json(['onemin' => 'This time slot has already been appointed']);
        }
        $a = $appointment_slots + 1;
        if($a > $slots->slots){
            return response()->json(['maxslots' => 'This date has been already full, Try to choose another date.']);
        }

        $noofficetime = array("12:00 AM", "1:00 AM" ,"2:00 AM" ,"3:00 AM","4:00 AM" ,"5:00 AM","6:00 AM" ,"7:00 AM","8:00 AM" 
                                ,"5:00 PM","6:00 PM","7:00 PM","8:00 PM","9:00 PM","10:00 PM","11:00 PM"); 

        if (in_array($request->time, $noofficetime))
        {
            return response()->json(['noofficetime' => 'The Hospital open time are 9:00 AM TO 5:00 PM']);
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
        Appointment::find($appointment->id)->delete();
        return response()->json(['success' => 'Cancelled Successfully.']);
    }
}
