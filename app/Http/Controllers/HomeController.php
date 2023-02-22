<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Membership;
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
        $Campaign= Campaign::translatedIn(app()->getLocale())->get();
        //dd($Campaign[0]['title']);
        //dd($Campaign);
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

    public function membership(){
        return view('user.membership');
    }

    public function checkout(Request $request){
       //dd($request->all());
        
        if($request->has('membership')){
            $membership=Membership::where('id',$request->membership)->first();
            //dd($membership);
            session(['amount' => $membership->amount]);
            session(['membership_id' => $membership->id]);
        }else{
            $validate=$this->validate($request,[
                'amount' => 'required|gt:10',
            ]);
            session(['amount' => $request->amount]);
            session(['campaign_id' => $request->campaign_id]);
        }
       
        // session(['amount' => $request->amount]);
        // session(['campaign_id' => $request->campaign_id]);
        
        return redirect()->route('checkout.web');
        
    }
    public function checkout_view(Request $request){
        //dd($request->id);
        // $validate=$this->validate($request,[
        //     'amount' => 'required|gt:10',
        // ]);
        //$amount=$request->amount;
        $amount = $request->session()->get('amount');
        $camp_id = $request->session()->get('campaign_id');
        if( $request->session()->exists('campaign_id') && $camp_id !=null){
            $Campaign=Campaign::whereId($camp_id)->first();
            return view('checkout',compact('Campaign','amount'));
           
        }
        if( $request->session()->exists('membership_id')){
            $Campaign=Membership::where('id',$request->session()->get('membership_id'))->first();
            return view('checkout',compact('Campaign','amount'));
        }
        return redirect()->back();
        //dd($amount,$camp_id);
        
        //dd($Campaign);
        
    }
}
