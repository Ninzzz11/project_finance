<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Validation\ValidationException;
use PDO;

class UserLoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function create(){
        $attributes = request()->validate([
            'email'=> ['required','email'],
            'password'=>['required']
        ]);

        if(! FacadesAuth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=>'Email is not registered.',
                'password'=>'Wrong password.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/dashboard');

    }

    public function destroy(){

        FacadesAuth::logout();

        return redirect('/');
    }
}
