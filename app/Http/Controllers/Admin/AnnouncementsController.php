<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcements;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use File;

class AnnouncementsController extends Controller
{
   
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            date_default_timezone_set('Asia/Manila');
            
            $announcements = Announcements::where('isRemove', 0)->latest()->get();
            return view('admin.announcements', compact('announcements'));
        }
        return abort('403');
    }

   
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required'],
            'link_website' => ['nullable', 'string'],
            'image' =>  ['required' , 'mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $userid = auth()->user()->id;

        $imgs = $request->file('image');
        $extension = $imgs->getClientOriginalExtension(); 
        $file_name_to_save = time()."_".$userid.".".$extension;
        $imgs->move('assets/img/announcements/', $file_name_to_save);

        Announcements::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'link_website' => $request->input('link_website'),
            'image' => $file_name_to_save,
            'user_id' => $userid,
        
           
        ]);

        return response()->json(['success' => 'Announcement Added Successfully.']);
    }

    
    public function show(Announcements $announcement)
    {
        
    }

   
    public function edit(Announcements $announcement)
    {
        if (request()->ajax()) {
            return response()->json(['result' =>  $announcement]);
        }
    }

    
    public function updateannouncement(Request $request, Announcements $announcement)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required'],
            'link_website' => ['nullable', 'string'],
            'image' => ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $userid = auth()->user()->id;

        if (isset($_FILES['image'])) {
            File::delete(public_path('assets/img/announcements/'.$announcement->image));
            $imgs = $request->file('image');
            $extension = $imgs->getClientOriginalExtension(); 
            $file_name_to_save = time()."_".$userid.".".$extension;
            $imgs->move('assets/img/announcements/', $file_name_to_save);
            $announcement->image = $file_name_to_save;
        }
       
        $announcement->title = $request->title;
        $announcement->body = $request->body;
        $announcement->link_website = $request->link_website;
        $announcement->save();

        return response()->json(['success' => 'Announcement Updated Successfully.']);
    }

    public function destroy(Announcements $announcement)
    {
        File::delete(public_path('assets/img/announcements/'.$announcement->image));
        $announcement->delete();
        return response()->json(['success' =>  'Announcement Removed Successfully.']);
    }
}
