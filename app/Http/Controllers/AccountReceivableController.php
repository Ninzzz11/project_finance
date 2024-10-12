<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountReceivableController extends Controller
{
    public function index(){
        return view('accounts-receivable.index');
    }

    public function create(){
        return view('accounts-receivable.create');
    }


    // ACCOUNTS RECEIVABLE
// Route::get('/accounts-receivable', function(){
//     return view('accounts-receivable.index');
// });
// Route::get('/accounts-receivable/create', function(){
//     return view('accounts-receivable.create');
// });

}
