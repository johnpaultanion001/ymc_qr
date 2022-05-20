<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;

class HistoricalController extends Controller
{
    public function historical(Request $request){
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            $appointments = Appointment::where('isMove', '1')->latest()->get();
            return view('admin.historical', compact('appointments'));
        }
        return abort('403');
    }

    public function appointments_reports($filter){

        date_default_timezone_set('Asia/Manila');
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            if($filter == 'daily'){
                $title_filter  = 'From: ' . date('F d, Y') . ' To: ' . date('F d, Y');
                $appointments = Appointment::where('isMove', '1')->latest()->whereDate('date', Carbon::today())->get();
            }
            elseif($filter == 'weekly'){
                $title_filter  = 'From: ' . Carbon::now()->startOfWeek()->format('F d, Y') . ' To: ' . Carbon::now()->endOfWeek()->format('F d, Y');
                $appointments = Appointment::where('isMove', '1')->latest()->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            }
            elseif($filter == 'monthly'){
                $title_filter  = 'From: ' . date('F '. 1 .', Y') . ' To: ' . date('F '. 31 .', Y');
                $appointments = Appointment::where('isMove', '1')->latest()->whereMonth('date', '=', date('m'))->whereYear('date', '=', date('Y'))->get();
            }
            elseif($filter == 'yearly'){
                $title_filter  = 'From: ' .'Jan 1'. date(', Y') . ' To: ' .'Dec 31'. date(', Y');
                $appointments = Appointment::where('isMove', '1')->latest()->whereYear('date', '=', date('Y'))->get();
            }
            elseif($filter == 'all'){
                $title_filter  = 'ALL RECORDS';
                $appointments = Appointment::where('isMove', '1')->latest()->get();
            }else{
                $title_filter  = 'From: ' . date('F d, Y') . ' To: ' . date('F d, Y');
                $appointments = Appointment::where('isMove', '1')->latest()->whereDate('date', Carbon::today())->get();
            }
        }

        return view('admin.historical', compact('appointments','title_filter'));
       
    }

    // public function move(Request $request){
    //     $ids = $request->get('ids');

    //     Appointment::whereIn('id', $ids)->update([
    //         'isMove' => 1,
    //     ]);
    //     return response()->json(['success' => 'Moved Successfully.']);
    // }
}
