<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventAttendance;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use File;

class EventsController extends Controller
{
   
    public function index()
    {
        $events = Event::where('isRemove', 0)->latest()->get();
        return view('admin.events.events', compact('events'));
        
    }

   
    public function show(Event $event)
    {
        return view('admin.events.event', compact('event'));
    }

    
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'category' => ['required'],
            'date' => ['required','date','after:today'],
            'time' => ['required'],
            'image' =>  ['required' , 'mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $userid = auth()->user()->id;

        $imgs = $request->file('image');
        $extension = $imgs->getClientOriginalExtension(); 
        $file_name_to_save = time()."_".$userid.".".$extension;
        $imgs->move('assets/img/events/', $file_name_to_save);

        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'image' => $file_name_to_save,
            'user_id' => $userid,
        ]);

        return response()->json(['success' => 'Event Added Successfully.']);
    }

    public function attandance(Request $request, $event, $student){
        
        EventAttendance::updateOrCreate(
            [
                'event_id' => $event,
                'student_id' => $student,
            ],
            [
                'event_id' => $event,
                'student_id' => $student,
                'user_id'   => auth()->user()->id,
            ]
        );

        return response()->json(['success' => 'Added Successfully.']);
    }

    public function attandance_record(Event $event){
        $attendances_record = EventAttendance::where('event_id', $event->id)->latest()->get();

        foreach($attendances_record as $attendance){
            $attendances_data[] = array(
                'id'        => $attendance->id ?? '', 
                'name'        => $attendance->student->name ?? '', 
                'email'        => $attendance->student->email ?? '', 
                'grade_section'        => $attendance->student->grade_section ?? '', 
                'attendance_by'        => $attendance->user->name ?? '', 
                'attendance_at'        => $attendance->created_at->format('M j , Y h:i A'), 
            );
        }

        return response()->json([
            'attendances'  => $attendances_data ?? '',
        ]);
    }
   
    public function edit(Event $event)
    {
        if (request()->ajax()) {
            return response()->json(['result' =>  $event]);
        }
    }

    
    public function update_event(Request $request, Event $event)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'category' => ['required'],
            'date' => ['required','date','after:today'],
            'time' => ['required'],
            'image' =>  ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $userid = auth()->user()->id;

        if ($request->file('image')) {
            File::delete(public_path('assets/img/events/'.$event->image));
            $imgs = $request->file('image');
            $extension = $imgs->getClientOriginalExtension(); 
            $file_name_to_save = time()."_".$userid.".".$extension;
            $imgs->move('assets/img/events/', $file_name_to_save);
            $event->image = $file_name_to_save;
        }
       
        $event->title = $request->title;
        $event->description = $request->description;
        $event->category = $request->category;
        $event->date = $request->date;
        $event->time = $request->time;

        $event->save();

        return response()->json(['success' => 'Event Updated Successfully.']);
    }

    public function destroy(Event $event)
    {
        File::delete(public_path('assets/img/events/'.$event->image));
        $event->update([
            'isRemove'  => '1',
        ]);
        return response()->json(['success' =>  'Event Removed Successfully.']);
    }

    public function attandance_remove(EventAttendance $id){
        $id->delete();
        return response()->json(['success' =>  'Removed Successfully.']);
    }
}
