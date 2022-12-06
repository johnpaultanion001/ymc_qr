<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotification;
use File;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::where('isRemove', 0)->latest()->get();
        return view('admin.students', compact('students'));
    }
    public function status(Request $request)
    {
        $id = $request->get('id');
        $student = Student::where('id', $id)->first();

        $emailNotif = [
            'notif_message'     => '',
            'name'              =>  $student->name,
            'register_at'       =>  $student->created_at->format('F d,Y '),
            'approved_by'       =>  auth()->user()->name,

        ];

        if($student->status == 'PENDING'){
          

            $emailNotif['notif_message']  = 'You have Successfully registered, Check your qr code below';
            Mail::to($student->email)
                ->send(new EmailNotification($emailNotif));

            $student->update([
                'status' => 'APPROVED'
            ]);
        }else{
            $student->update([
                'status' => 'PENDING'
            ]);
        }

        return response()->json(['success' => 'Successfully updated.']);
    }
    public function remove_student(Request $request, Student $student)
    {
        File::delete(public_path('assets/school_id/'.$student->school_id));
        $student->update([
            'isRemove' => 1,
        ]);
        return response()->json(['success' => 'Successfully removed.']);
    }
    
}
