<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountPayableController extends Controller
{
    public function index(){
        return view('accounts-payable.index');
    }

    public function invoice(){
        return view('accounts-payable.invoice');
    }
}
