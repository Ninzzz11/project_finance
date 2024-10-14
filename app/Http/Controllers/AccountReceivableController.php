<?php

namespace App\Http\Controllers;

use App\Models\AccountReceivable;
use Illuminate\Http\Request;

class AccountReceivableController extends Controller
{
    public function index(){
        $clients = AccountReceivable::all();

        return view('accounts-receivable.index', ['clients'=>$clients] );
    }

    public function invoice(){
        return view('accounts-receivable.invoice');
    }

    public function create(){

        $attribute = request()->validate([
            'customer'=> ['required'],
            'invoice_no'=> ['required'],
            'terms'=> ['required','integer'],
            'start_date'=> 'required|date',
            'due_date'=> 'required|date',
            'grand_total'=> ['required']
        ]);


        AccountReceivable::create($attribute);

        // return redirect()->back()->withErrors($attribute)->withInput();

        return redirect()->route('ar.index')->with('success','Invoice created successfully.');

        // return view('/accounts-receivable/index');
    }



}
