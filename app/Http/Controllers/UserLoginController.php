<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use PDO;

class UserLoginController extends Controller
{
    public function login(){

        if(Auth::check()){
            return redirect('/dashboard');
        }

        return view('auth.login');
    }

    public function create(Request $request){
        // validate the user
        $attributes = $request->validate([
            'email'=> ['required','email'],
            'password'=>['required']
        ]);

        // login attempt the user
        if(Auth::attempt($attributes,$request->remember)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }else{
            throw ValidationException::withMessages([
                'failed'=>'Email or password does not match'
            ]);
        }

    }

    public function destroy(Request $request){
        // logout the user
        Auth::logout();

        // invalidate session cookie
        $request->session()->invalidate();

        // generate csrf token
        $request->session()->regenerateToken();

        // redirect users to login
        return redirect()->route('login');
    }
}
