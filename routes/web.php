<?php

use App\Http\Controllers\AccountPayableController;
use App\Http\Controllers\AccountReceivableController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisteredController;
use App\Models\AccountPayable;
use App\Models\AccountReceivable;
use Illuminate\Support\Facades\Route;


// LOGIN
Route::get('/login',[UserLoginController::class, 'login'])->name('login');
Route::post('/create', [UserLoginController::class, 'create'])->name('login-session');
Route::post('/logout',[UserLoginController::class, 'destroy'])->name('logout');

// SIGN UP
Route::get('/signup',[UserRegisteredController::class, 'signup']);
Route::post('/register', [UserRegisteredController::class, 'register']);

// DASHBOARD
Route::get('/dashboard',function(){
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function(){
    // ACCOUNTS RECEIVABLE
    Route::get('/accounts-receivable', [AccountReceivableController::class,'index'])->name('ar.index');
    Route::get('/accounts-receivable/invoice', [AccountReceivableController::class,'invoice']);
    Route::post('/ar-create', [AccountReceivableController::class, 'store'])->name('ar.store');
    Route::post('/ar-accounts', [AccountReceivableController::class, 'customer'])->name('ar.accounts');
    Route::get('/accounts-receivable/invoice', [AccountReceivableController::class, 'select']);
    Route::get('/accounts-receivable/invoice/{customers}', [AccountReceivableController::class, 'input']);
    Route::get('/accounts-receivable/{view}', [AccountReceivableController::class,'view']);
    Route::get('/accounts-receivable/edit/{id}', [AccountReceivableController::class,'edit']);
    Route::get('/accounts-receivable/account/{id}', [AccountReceivableController::class,'account']);
    Route::patch('/accounts-receivable/account/edit/{id}', [AccountReceivableController::class,'save']);
    Route::delete('/accounts-receivable/account/{id}', [AccountReceivableController::class,'remove']);
    Route::patch('/accounts-receivable/edit/{id}', [AccountReceivableController::class,'edited']);
    Route::delete('/accounts-receivable/{invoice}', [AccountReceivableController::class,'delete']);
});



// ACCOUNTS PAYABLE
Route::middleware('auth')->group(function(){
    Route::get('/accounts-payable', [AccountPayableController::class,'index']);
    Route::get('/accounts-payable/invoice', [AccountPayableController::class,'invoice']);

});

// COLLECTION
Route::get('/collection', function(){
    return view('collection.index');
});

// GENERAL LEDGER
Route::get('/general-ledger', function(){
    return view('general-ledger.index');
});

// BUDGET MANAGEMENT
Route::get('/budget-management', function(){
    return view('budget-management.index');
});

// PAYMENT REMINDER
Route::get('/payment-reminder', function(){
    return view('payment-reminder.index');
});



Route::get('/tester', function(){
    return view('select-layout');
});
