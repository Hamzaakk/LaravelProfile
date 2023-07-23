<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }
    public function loginAction(Request $request)
    {
        // dd($request);
        $email = $request->email;
        $password = $request->password;
        $values = ['email'=>$email,'password'=>$password];
        if(Auth::attempt($values)){
         $request->session()->regenerate();
         return to_route('homepage')->with('successLogin','vous étes bien connecté');
        }else{
           return back()->withErrors([
            'email'=>'email or password inccorect'
           ])->onlyInput('email');
        }
    }

    public function  logout()
    {
        Session::flush();
        Auth::logout();
        return to_route('login')->with('successLogout','vous étes bien déconnecté');

    }
}
