<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard(){
        //dd(config('settings.site_name'));
        $total=Payment::where('status','complete')->sum('amount');
        $total_24_hours=Payment::where('status','complete')->where('created_at',">=",Carbon::now()->subDay())->sum('amount');
        return view('admin.dashboard',compact('total','total_24_hours'));
    }
    public function donation(){
        return view('admin.donation');
    }

    
}
