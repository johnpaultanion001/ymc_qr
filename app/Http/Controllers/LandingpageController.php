<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;

class LandingpageController extends Controller
{
    public function index()
    {
        $announcements = Announcements::where('isRemove', 0)->latest()->get();
        return view('welcome', compact('announcements'));
    }

    public function view(Announcements $announcement)
    {
        if (request()->ajax()) {
            return response()->json(['result' =>  $announcement]);
        }
    }
}
