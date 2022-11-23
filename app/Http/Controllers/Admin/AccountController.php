<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function trainors()
    {
        $trainors = User::where('role', 'trainor')->latest()->get();
        return view('admin.trainors' , compact('trainors'));
    }

    public function animators()
    {
        $animators = User::where('role', 'animator')->latest()->get();
        return view('admin.animators' , compact('animators'));
    }

    public function edit(User $account){
        if (request()->ajax()) {
            return response()->json([
                'result' =>  $account,
            ]);
        }
    }

    public function store(Request $request){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name'           => ['required'],
            'email'          => ['required',  'email', 'max:255', 'unique:users'],
            'contact_number' => ['required', 'string', 'min:8','max:11'],
            'password'       => ['required', 'min:8'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::create([
            'role'                  => $request->input('role'),
            'name'                  => $request->input('name'),
            'email'                 => $request->input('email'),
            'contact_number'        => $request->input('contact_number'),
            'password'              => Hash::make($request->input('password')),
            'email_verified_at'     => date("Y-m-d H:i:s"),
        ]);    

        return response()->json(['success' => 'Successfully created.']);
    }
    
    public function update(Request $request ,User $account){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name'           => ['required'],
            'email'          => ['required',  'email', 'max:255', 'unique:users,email,'.$account->id],
            'contact_number' => ['required', 'string', 'min:8','max:11'],
            'password'       => ['nullable','min:8'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $account->update([
            'name'                  => $request->input('name'),
            'email'                 => $request->input('email'),
            'contact_number'        => $request->input('contact_number'),
            'password'              => Hash::make($request->input('password')),
        ]);

       
        return response()->json(['success' => 'Successfully updated.']);
    }

    public function destroy(User $account){
        date_default_timezone_set('Asia/Manila');
       
        $account->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }
}
