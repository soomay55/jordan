<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    
    function showLogin(){
        return view('admin.loginform');
    }

    function checkLogin(Request $request){
        $input=$request->all();
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$input['email'],'password'=>$input['password']])){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('email or password is wrongs');
        }
    }
    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
