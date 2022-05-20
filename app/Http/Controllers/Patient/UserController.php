<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use File;

class UserController extends Controller
{
    public function updateshow()
    {
        return view('patient.update_info');

    }
    public function update(Request $request , User $user)
    {
        date_default_timezone_set('Asia/Manila');
        if(Auth()->user()->isRegistered == 0){
            $validated =  Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'birth_date' => ['required', 'date' , 'before:today'],
                'contact_number' => ['required', 'string', 'min:8','max:11'],
                'civil_status' => ['required'],
                'gender' => ['required'],
                'address' => ['required'],
                'id_picture' =>  ['required' , 'mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
            ]);
        }else{
            $validated =  Validator::make($request->all(), [
                'id_picture' =>  ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
            ]);
        }
        
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        if(Auth()->user()->isRegistered == 0){
            $id = $request->file('id_picture');
            $extension = $id->getClientOriginalExtension(); 
            $file_name_to_save = time()."_".auth()->user()->id.".".$extension;
            $id->move('assets/img/id/', $file_name_to_save);
        }else{
            if($request->file('id_picture')){
                File::delete(public_path('assets/img/id/'.Auth()->user()->id_picture));
                $id = $request->file('id_picture');
                $extension = $id->getClientOriginalExtension(); 
                $file_name_to_save = time()."_".auth()->user()->id.".".$extension;
                $id->move('assets/img/id/', $file_name_to_save);
            }else{
                $file_name_to_save = Auth()->user()->id_picture;
            }
           
        }
        if(Auth()->user()->isRegistered == 0){
            $dob = $request->input('birth_date');
            $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
            User::find($user->id)->update([
                'name' => $request->input('name'),
                'birth_date' => $request->input('birth_date'),
                'contact_number' => $request->input('contact_number'),
                'civil_status' => $request->input('civil_status'),
                'gender' => $request->input('gender'),
                'address' => $request->input('address'),
                'age'      => $age,
                'id_picture' => $file_name_to_save,
                'isRegistered' => true,
            ]);
        }else{
            User::find($user->id)->update([
                'id_picture' => $file_name_to_save,
                'isRegistered' => true,
            ]);
        }
    

        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function changepassword(Request $request , User $user)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'current_password' => ['required',new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['required','same:new_password'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($user->id)->update([
            
            'password' => Hash::make($request->input('new_password')),
          
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }
}
