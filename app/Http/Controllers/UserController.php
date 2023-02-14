<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function donation(){
        return view('donation');
    }
    public function success(Request $request){
        return view('success');
    }

    public function register_user(Request $request){
        //dd($request->name);
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required'],
            'country' => ['required'],
            
            'zip' => ['required'],

        ]);
        $user=User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'country' => $request->country,
            'zip' => $request->zip
        ]);

        if(Auth::attempt(['email'=>$user->email,'password'=>$request->password])){
            $request->session()->regenerate();
            return back();
        };
        //$user=-User::create($request->all());
        dd(Auth::user());
    }

    public function login_user(Request $request){
        $this->validate($request,[            
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required'],
         ]);

         $user= Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
         if($user){
            $request->session()->regenerate();
            return back();
         }
         
    }
}
