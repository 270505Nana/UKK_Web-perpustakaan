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

        $validatedData = $request->validate([
            'name' => 'required|max:20|min:4',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:15'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect ('/')->with('success','Berhasil registrasi, silahkan login!');
    }

    public function loginproses(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            if (auth()->user()->role_id == 2) {
                $request->session()->regenerate(); 
                return redirect()->intended('/dashboard_user');
            }
            else{
                $request->session()->regenerate(); 
                return redirect()->intended('/dashboard');
            }
           
            // intended itu supaya kalau dia redirect melewati middlewarenya dulu
        } 

        return back()->with('loginError','Gagal login, email atau password anda salah');
          
    }

    public function logout(){
        Auth::logout();
        // pake bawaan aja
        return redirect ('/');
    }
}
?>