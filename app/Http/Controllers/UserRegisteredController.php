<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRegisteredController extends Controller
{
    public function signup(){
        return view('auth.signup');
    }

    public function register(){
        // validate
        request()->validate([
            'username'=>['required','min:8'],
            'email'=>['required','email'],
            'password'=>['required', 'min:8']
        ]);

        // attributes
        User::create([
            'username'=> request('username'),
            'email'=> request('email'),
            'password'=>request('password')
        ]);

        return redirect('/');

    }


}
