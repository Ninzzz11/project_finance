<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Invoice;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountReceivableController extends Controller
{
    // VIEW INDEX
    public function index(){
        $clients = Invoice::with('account','services')->paginate(10);
        $accounts = Accounts::paginate(10);

        foreach ($clients as $invoice) {
            $invoice->status = $this->calculateInvoiceStatus($invoice);
        }

        if(!$clients){
            return ;
        }

        return view('accounts-receivable.index', ['clients'=>$clients,'accounts'=>$accounts]);
    }

    // CALCULATE THE STATUS
    private function calculateInvoiceStatus($invoice){

        $today = now(); // Get today's date
        $dueDate = $invoice->due_date;

        // Check if the invoice is already paid
        if ($invoice->status == 'Paid') {
            return 'Paid';
        }

        // Check if the invoice is due or pending
        if ($today->greaterThan($dueDate)) {
            return 'Overdue'; // The due date has passed
        } else {
            return 'Pending'; // The invoice is still within the due date
        }
    }

    // VIEW THE CREATE INVOICE
    public function invoice(){
        return view('accounts-receivable.invoice');
    }

    // STORE ACCOUNTS
    public function customer(Request $request){

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact_no' => 'required|digits:11',
            'address' => 'required|string',
        ]);

        Accounts::create($request->all());

        return redirect()->back()->with('message', 'Account created successfully!');
    }

    // SHOW ACCOUNTS ON SELECTION
    public function select(){
        // Assume you have a Customer model
        $customers = Accounts::all();

        // Return the customer data as a JSON response
        return view('accounts-receivable.invoice',compact('customers'));
    }


    // STORE INVOICE
    public function store(Request $request)
    {

        // Validate the request data
        $validated = $request->validate([
            // 'customer' => 'required|string|max:255',
            // 'invoice_no' => 'required|string|max:50',
            'accounts_id'=> 'required|exists:ar_accounts,id',
            'status' => 'required|string',
            'terms' => 'required|string',
            'start_date' => 'required|date',
            'due_date' => 'required|date',
            'grand_total' => 'required|numeric',
            'services.*.description' => 'required|string',
            'services.*.amount' => 'required|numeric',
            'services.*.quantity' => 'required|integer',
            'services.*.total' => 'required|numeric',
        ],[
            'services.*.description.required' => 'Description is required.',
            'services.*.amount.required' => 'Amount is required.',
            'services.*.amount.numeric' => 'Amount must be a number.',
        ]);

        // Create the invoice
        $invoice = Invoice::create([
            // 'customer' => $request->customer,
            // 'invoice_no' => $request->invoice_no,
            'accounts_id'=> $validated['accounts_id'],
            'status' => $validated['status'],
            'terms' => $validated['terms'],
            'start_date' => $validated['start_date'],
            'due_date' => $validated['due_date'],
            'grand_total' => $validated['grand_total']
        ]);

        // Create services associated with the invoice
        foreach ($validated['services'] as $service) {
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

    // VIEW ACCOUNT PAGE
    public function account($id){
        $accounts = Accounts::findOrFail($id);

        return view('accounts-receivable.account', ['accounts'=>$accounts]);
    }

    // EDIT ACCOUNTS
    public function save(Request $request,$id){

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact_no' => 'required|digits:11',
            'address' => 'required|string',
        ]);

        $account= Accounts::findOrFail($id);

        $account->update([$validated]);

        return redirect('/accounts-receivable')->with('message', 'Account edited successfully!');
    }

    // DELETE
    public function remove($id){
        $account = Accounts::findOrFail($id);
        $account->delete();

        return redirect('/accounts-receivable')->with('message','account deleted successfully.');
    }

    // INPUT ACCOUNT
    public function input(Accounts $customers)
    {
        return response()->json($customers);
    }

    // VIEW THE INVOICE
    public function view(Invoice $view){

        return view('accounts-receivable.view', ['view'=> $view]);
    }

    // SHOW THE EDIT INVOICE
    public function edit($id){
        $accounts = Accounts::with('invoices')->get();
        $invoiceWithAccount = Invoice::with('account')->findOrFail($id);

        return view('accounts-receivable.edit', ['invoices' => $invoiceWithAccount,'accounts'=>$accounts]);
    }


    public function edited($id)
    {
        // Validate input data
        $validated = request()->validate([
            'accounts_id' => 'required|exists:ar_accounts,id',
            'status' => 'required|string',
            'terms' => 'required|string',
            'start_date' => 'required|date',
            'due_date' => 'required|date',
            'grand_total' => 'required|numeric',
            'services.*.description' => 'required|string',
            'services.*.amount' => 'required|numeric',
            'services.*.quantity' => 'required|integer',
            'services.*.total' => 'required|numeric',
        ],[
            'services.*.description.required' => 'Description is required.',
            'services.*.amount.required' => 'Amount is required.',
            'services.*.amount.numeric' => 'Amount must be a number.',
        ]);

        // Find the invoice and its associated services
        $invoice = Invoice::with('services')->findOrFail($id);

        // Update the invoice data
        $invoice->update([
            'accounts_id' => $validated['accounts_id'],
            'status' => $validated['status'],
            'terms' => $validated['terms'],
            'start_date' => $validated['start_date'],
            'due_date' => $validated['due_date'],
            'grand_total' => $validated['grand_total'],
        ]);

        // Collect service IDs from the request
        $newServiceIds = [];
        foreach ($validated['services'] as $services) {
            if (isset($services['id'])) {
                // Update existing service
                $service = $invoice->services()->find($services['id']);
                if ($service) {
                    $service->update([
                        'description' => $services['description'],
                        'amount' => $services['amount'],
                        'quantity' => $services['quantity'],
                        'total' => $services['total'],
                    ]);
                    $newServiceIds[] = $service->id; // Track the updated service IDs
                }
            } else {
                // Create new service
                $newService = $invoice->services()->create([
                    'description' => $services['description'],
                    'amount' => $services['amount'],
                    'quantity' => $services['quantity'],
                    'total' => $services['total'],
                ]);
                $newServiceIds[] = $newService->id; // Track the newly created service IDs
            }
        }

        // Delete services that are no longer present in the request
        $invoice->services()->whereNotIn('id', $newServiceIds)->delete();

        // Redirect with success message
        return redirect('/accounts-receivable')->with('message', 'Invoice edited successfully.');

    }


    // DELETE THE INVOICE
    public function delete(Invoice $invoice){
        $invoice->delete();

        return redirect('/accounts-receivable')->with('message','invoice deleted successfully.');
    }


}
