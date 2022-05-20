<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Validator;

class ServiceController extends Controller
{
    
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            $services = Service::latest()->get();
            return view('admin.services', compact('services'));
        }
        return abort('403');
    }

   
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string' , 'unique:services'],
            'category' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Service::create([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
        ]);

        return response()->json(['success' => 'Added Successfully.']);
    }

    public function edit(Service $service)
    {
        if (request()->ajax()) {
            return response()->json(['result' =>  $service]);
        }
    }

    public function update(Request $request, Service $service)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'category' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Service::find($service->id)->update([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

    
    public function destroy(Service $service)
    {
        Service::find($service->id)->delete();
        return response()->json(['success' => 'Removed Successfully.']);
    }

    public function date_time(Request $request){
        $service = $request->get('service'); 

        if($service == 1)
        {
            $days = [0,1,2,3,5,6];
            $times = [13,14,15];
        }
        elseif($service == 2){
            $days = [0,6];
            $times = [8,9,10,11,12,13,14];
        }
        elseif($service == 3){
            $days = [0,6];
            $times = [9,10,11];
        }
        elseif($service == 4){
            $days = [0,1,2,5,6];
            $times = [12,13,14];
        }
        elseif($service == 5){
            $days = [0,6];
            $times = [13,14,15];
        }
        elseif($service == 6){
            $days = [0,1,6];
            $times = [8,9,10,11,12,13,14,15,16];
        }
        elseif($service == 7){
            $days = [0,6];
            $times = [8,9,10,11,12,13,14,15,16];
        }
        elseif($service == 8){
            $days = [0,1,2,4,5,6];
            $times = [8,9,10,11];
        }
        elseif($service == 9){
            $days = [0,6];
            $times = [8,9,10,11,12,13,14,15,16];
        }
        elseif($service == 10){
            $days = [];
            $times = [8,9,10,11,12,13,14,15,16];
        }
        else{
            $days = [];
            $times = [8,9,10,11,12,13,14,15,16];
        }
       
        return view('patient.date_time' , compact('days', 'times'));
    }
}
