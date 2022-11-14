<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Event;
use Validator;

class LandingpageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function events()
    {
        $events = Event::where('isRemove', 0)->latest()->get();
        return view('users/events', compact('events'));
    }

    public function student_register(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:255', 'unique:students'],
            'contact_number' => ['required', 'min:8','max:11', 'unique:students'],
            'grade_section' => ['required'],
            'birthdate' => ['required', 'date', 'before:today'],
            'school_id' =>  ['required' , 'mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
            'terms_and_conditions' => ['accepted']
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $id = $request->file('school_id');
        $extension = $id->getClientOriginalExtension(); 
        $file_name_to_save = time()."_".$request->input('name').".".$extension;
        $id->move('assets/school_id/', $file_name_to_save);

        Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_number' => $request->input('contact_number'),
            'grade_section' => $request->input('grade_section'),
            'birthdate' => $request->input('birthdate'),
            'school_id' => $file_name_to_save,
        ]);

        return response()->json(['success' => 'Successfully registered wait for the email of the administrator for your approval and your qr code.']);
    }

    

    public function view(Event $event)
    {
        if (request()->ajax()) {
            return response()->json(
                [
                    'result' =>  $event,
                    'date_time' =>  $event->date->format('F d,Y ') .'-'. $event->time,
                    'user' =>  $event->user->name,
                ]
            );
        }
    }
}
