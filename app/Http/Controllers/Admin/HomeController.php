<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Event;
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
       $students = Student::where('isRemove', 0)->latest()->get();
       $events = Event::where('isRemove', 0)->orderBy('date', 'asc')->get();
       $users = User::latest()->get();
       return view('admin.home', compact('students','events','users'));
    }
}
