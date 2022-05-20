<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            $pending = Appointment::where('status', 'PENDING')->where('isMove', '0')->count();
            $approved = Appointment::where('status', 'APPROVED')->where('isMove', '0')->count();
            $declined = Appointment::where('status', 'DECLINED')->where('isMove', '0')->count();
            $follow = Appointment::where('status', 'FOLLOW-UP')->where('isMove', '0')->count();
            $completed = Appointment::where('status', 'COMPLETED')->where('isMove', '0')->count();
            $failed = Appointment::where('status', 'FAILED')->where('isMove', '0')->count();

            $patients = User::where('role', 'patient')->count();
            $doctors = User::where('role', 'doctor')->count();
            

            $appointment_for_now = Appointment::whereDay('date', '=', date('d'))->where('isMove', '0')->latest()->get();
            return view('admin.home', compact('pending','approved', 'declined','completed','follow','patients','appointment_for_now','doctors' ,'failed'));
        }
        return abort('403');
    }
}
