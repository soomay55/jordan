<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Campaign;
use App\Models\Donation;
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
        $Campaign=Donation::all();
        $total=Donation::where('status','paid')->sum('amount');
        $total_24_hours=Donation::where('status','paid')->where('created_at',">=",Carbon::now()->subDay())->sum('amount');
        return view('admin.dashboard',compact('total','total_24_hours','Campaign'));
    }
    public function donation(){
        $Campaign=Donation::where('status','paid')->with('campaign')->get();
        //dd($Campaign);
        return view('admin.donation',compact('Campaign'));
    }

    
}
