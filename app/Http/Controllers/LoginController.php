<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller

{
    // use AuthenticatesUsers;
    public function login(){
        return view ('login');
    }

    public function register(){
        return view ('register');
    }

    public function registeruser(Request $request){
       User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
       ]);

       return redirect ('/login');
    }

    public function loginproses(Request $request){

        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            if (Auth::user()->role_id == '1') {
                return redirect('/')->with('status', 'Welcome to admin page');
            } elseif (Auth::user()->role_as == '2') {
                return redirect('/dashboard_user')->with('status', 'Logged in successfully');
            }
            $request->session()->regenerate(); 
            return redirect()->intended('/');
        } 

        return back()->with('loginError', 'Login Failed');
          
        // if (Auth::attempt($request->only('email','password'))) {
        //     return back()->with('loginError', 'Login Failed');
        //   }

        //   return redirect ('login');
    }

    public function logout(){
        Auth::logout();
        // pake bawaan aja
        return redirect ('login');
    }
}
