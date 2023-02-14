<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locale = App::currentLocale();
    //dd($locale);
        $Campaign= Campaign::all();
        return view('index',compact('Campaign'));
    }
    public function about(){
        return view('about');
    }
    public function mission(){
        return view('mission');
    }
    public function donate(){
        return view('donate');
    }
    public function bylaw(){
        return view('bylaw');
    }
    public function gallery(){
        return view('gallery');
    }
    public function event(){
        return view('event');
    }
    public function contact(){
        return view('contact');
    }
    public function donation($id){
        $Campaign=Campaign::find($id);
        //dd($Campaign);
        
        if($Campaign){
            $percent=($Campaign->available_fund/$Campaign->goal)*100;
            return view('donation',compact("Campaign","percent"));
        }else{
            return abort(404,"No recode found");
        }
        
    }

    public function checkout(Request $request){
        //dd($request->id);
        $validate=$this->validate($request,[
            'amount' => 'required|gt:10',
        ]);
        //$amount=$request->amount;
        session(['amount' => $request->amount]);
        session(['campaign_id' => $request->campaign_id]);
        //$Campaign=Campaign::whereId($request->id)->first();
        //dd($Campaign);
        return redirect()->route('checkout.web');
        //return view('checkout',compact('Campaign','amount'));
    }
    public function checkout_view(Request $request){
        //dd($request->id);
        // $validate=$this->validate($request,[
        //     'amount' => 'required|gt:10',
        // ]);
        //$amount=$request->amount;
        $amount = $request->session()->get('amount');
        $camp_id = $request->session()->get('campaign_id');
        if($amount==null || $camp_id==null){
            return redirect()->back();
        }
        //dd($amount,$camp_id);
        $Campaign=Campaign::whereId($camp_id)->first();
        //dd($Campaign);
        return view('checkout',compact('Campaign','amount'));
    }
}
