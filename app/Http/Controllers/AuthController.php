<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        if(Auth::user()){
            return redirect()->intended('/home');
        }

        $data = [
            'title' => 'Login'
        ];

        return view('index',$data);
    }

    public function cek_login(Request $request){
        $email      = $request->input('email');
        $password   = $request->input('password');

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->intended('/home')->with('success','You Logged In');
        }else{
            return redirect()->intended('/')->with('error', 'Email Or Password Is Wrong');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
