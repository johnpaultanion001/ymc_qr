<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function activity_log()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            $logs = ActivityLog::latest()->get();
            return view('admin.activity_logs', compact('logs'));
        }
        return abort('403');
    }
}
