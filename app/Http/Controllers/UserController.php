<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use UploadAble;
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
        return back()->withErrors(['Somthing went wrong']);
        //$user=-User::create($request->all());
        //dd(Auth::user());
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
         return back()->withErrors(['Email or password is incorrect']);
         
    }
    public function profile_image(Request $request){
        //dd($request->all());
        $validated = $request->validate([
            //"profile_image" => "required|mimes:jpeg,png,jpg",
            ]);
            $user = Auth::user();
            $image_name=$user->image;
        if ($request->has('profile_image')) {
            $image_name = $this->uploadOne($request->file('profile_image'), 'campaign');
            
        
            $user->image=$image_name;
            
            //dd($user);
            //Flash::message('Your account has been updated!');
        }
        $user->name=$request->name;
        $user->lastname=$request->lastname;
        $user->address=$request->address;
        $user->save();
       return back()->with('success', 'Your account has been updated!');
    }

    public function change_password(Request $request){
         # Validation
         $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
}
