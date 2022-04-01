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
            $pending = Appointment::where('status', 'PENDING')->count();
            $approved = Appointment::where('status', 'APPROVED')->count();
            $declined = Appointment::where('status', 'DECLINED')->count();
            $follow = Appointment::where('status', 'FOLLOW-UP')->count();
            $completed = Appointment::where('status', 'COMPLETED')->count();

            $patients = User::where('role', 'patient')->count();

            $appointment_for_now = Appointment::whereDay('date', '=', date('d'))->latest()->get();
            return view('admin.home', compact('pending','approved', 'declined','completed','follow','patients','appointment_for_now'));
        }
        return abort('403');
    }
}
