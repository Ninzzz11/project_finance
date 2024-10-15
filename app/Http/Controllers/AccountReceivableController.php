<?php

namespace App\Http\Controllers;

use App\Models\AccountReceivable;
use App\Models\Invoice;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountReceivableController extends Controller
{
    // VIEW INDEX
    public function index(){

        if(Auth::guest()){
            return redirect('/');
        }

        $clients = Invoice::paginate(10);

        return view('accounts-receivable.index', ['clients'=>$clients]);
    }

    // VIEW THE CREATE INVOICE
    public function invoice(){
        return view('accounts-receivable.invoice');
    }

    // STORE INVOICE
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'customer' => 'required|string|max:255',
            'invoice_no' => 'required|string|max:50',
            'terms' => 'required|string',
            'start_date' => 'required|date',
            'due_date' => 'required|date',
            'grand_total' => 'required|numeric',
            'services.*.description' => 'required|string',
            'services.*.amount' => 'required|numeric',
            'services.*.quantity' => 'required|integer',
            'services.*.total' => 'required|numeric',
        ]);

        // Create the invoice
        $invoice = Invoice::create([
            'customer' => $request->customer,
            'invoice_no' => $request->invoice_no,
            'terms' => $request->terms,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'grand_total' => $request->grand_total,
        ]);

        // Create services associated with the invoice
        foreach ($request->services as $service) {
            Service::create([
                'invoice_id' => $invoice->id,
                'description' => $service['description'],
                'amount' => $service['amount'],
                'quantity' => $service['quantity'],
                'total' => $service['total'],
            ]);
        }

        return redirect('/accounts-receivable')->with('message', 'Invoice created successfully.');
    }

    // VIEW THE INVOICE
    public function view($id){
        $view = Invoice::with('services')->findOrFail($id);

        return view('accounts-receivable.view', ['view'=> $view ]);
    }

    // SHOW THE EDIT INVOICE
    public function edit($id){
        $invoices = Invoice::with('services')->findOrFail($id);

        return view('accounts-receivable.edit', ['invoices'=> $invoices ]);
    }

    // EDITED INVOICE
    public function edited($id, Request $request){

        $request->validate([
            'customer' => 'required|string|max:255',
            'terms' => 'required|string',
            'start_date' => 'required|date',
            'due_date' => 'required|date',
            'grand_total' => 'required|numeric',
            'services.*.description' => 'required|string',
            'services.*.amount' => 'required|numeric',
            'services.*.quantity' => 'required|integer',
            'services.*.total' => 'required|numeric',
        ]);

        // Persist
        $invoices = Invoice::with('services')->findOrFail($id);

        // Create the invoice
        $invoices->update([
            'customer' => $request->customer,
            'terms' => $request->terms,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'grand_total' => $request->grand_total,
        ]);

        // Create services associated with the invoice
        foreach ($request->services as $service) {
            $invoices->update([
                'invoice_id' => $invoices->id,
                'description' => $service['description'],
                'amount' => $service['amount'],
                'quantity' => $service['quantity'],
                'total' => $service['total'],
            ]);
        }

        return redirect('/accounts-receivable')->with('message','Invoice edited sucessfully.');
    }

    // DELETE THE INVOICE
    public function delete($id){
        Invoice::with('services')->findOrFail($id)->delete();


        return redirect('/accounts-receivable')->with('message','invoice deleted successfully.');
    }



}
