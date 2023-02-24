<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function showRegisterForm(){
        return view('auth.register');
    }
    public function showRegisterParentForm(){
        return view('auth.register-parent');
    }
    public function login(Request $request){
        $this->validate($request,[            
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required'],
         ]);

         $user= Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
         if($user){
            $request->session()->regenerate();
            return redirect('/home');
         }
         return back()->withErrors(['Email or password is incorrect']);
    }
    public function register(Request $request){
        
        $member_id='';

        if($request->has('code') && $request->code !=null){
            $user= User::where('code',$request->code)->where('is_parent','=',1)->first();
           
            
            if($user){
                $member_id=$user->membership_id;
                $member_count= User::where('code',$request->code)->count();
                $member= Membership::where('id',$user->membership_id)->first()->member;
              
                if($member-$member_count<=0){
                    return back()->withInput()->withErrors(['code'=>"Membership is full"]);
                }
            }else{
            return back()->withInput()->withErrors(['code'=>"code is invaild"]);
            }
        }else{
            return back()->withInput()->withErrors(['code'=>"code is needed"]);
        };
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
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
            'zip' => $request->zip,
            'membership_id'=>$member_id,
            'code' => $request->code
        ]);
        if($user){
            if(Auth::attempt(['email'=>$user->email,'password'=>$request->password])){
                $request->session()->regenerate();
                return redirect('/home');
            };
           
        }else{
            return back()->withErrors(['error' =>'Something went wrong']);
        }

       
        

    }

    public function register_parent(Request $request){
       
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
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
            'zip' => $request->zip,
            
        ]);
        //dd($user);
        if($user){
            if(Auth::attempt(['email'=>$user->email,'password'=>$request->password])){
                $request->session()->regenerate();
                return redirect('/home');
            };
           
        }else{
            return back()->withErrors(['error' =>'Something went wrong']);
        }

        
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function check_code(Request $request){
        $user= User::where('code',$request->code)->where('is_parent','=',1)->first();
           
            
            if($user){
                $member_id=$user->membership_id;
                $member_count= User::where('code',$request->code)->count();
                $member= Membership::where('id',$user->membership_id)->first()->member;
              
                if($member-$member_count>0){
                    return response()->json(1);
                }
            }else{
                return response()->json(0);
            }
    }
}
