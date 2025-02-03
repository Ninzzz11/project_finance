<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRegisteredController extends Controller
{
    public function signup(){
        return view('auth.signup');
    }

    public function register(Request $request){
        // validate
        $fields = $request->validate([
            'username'=>['required','min:8'],
            'email'=>['required','email','unique:users'],
            'password'=>['required', 'min:3', 'confirmed']
        ]);

        // create
        User::create($fields);

        // attributes
        // User::create([
        //     'username'=> request('username'),
        //     'email'=> request('email'),
        //     'password'=>request('password')
        // ]);

        return redirect('/login');

    }


}
