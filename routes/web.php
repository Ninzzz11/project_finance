<?php

use App\Http\Controllers\AccountPayableController;
use App\Http\Controllers\AccountReceivableController;
use App\Http\Controllers\Collections;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisteredController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

// LOGIN
Route::get('/login',[UserLoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('/create', [UserLoginController::class, 'create'])->name('login-session');
Route::post('/logout',[UserLoginController::class, 'destroy'])->name('logout');


// SIGN UP
Route::get('/signup',[UserRegisteredController::class, 'signup'])->middleware('guest')->name('signup');
Route::post('/register', [UserRegisteredController::class, 'register'])->name('register');



// DASHBOARD
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// ACCOUNTS RECEIVABLE
Route::middleware('auth')->group(function(){

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
Route::middleware('auth')->group(function(){
    Route::get('/collection/payment-records', [Collections::class,'prIndex'])->name('payment-records');
    Route::get('/collection/payment-collection', [Collections::class,'pcIndex'])->name('payment-collection');
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

// ACCOUNT PAGE
Route::get('/account-page', function(){
    return view('account-page.index');
});

Route::get('/tester', function(){
    return view('select-layout');
});
