<?php

use App\Http\Controllers\AccountReceivableController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisteredController;
use Illuminate\Support\Facades\Route;


// LOGIN
Route::get('/',[UserLoginController::class, 'login'])->name('login-session');
Route::post('/login', [UserLoginController::class, 'create'])->name('login');
Route::post('/logout',[UserLoginController::class, 'destroy'])->name('logout');

// SIGN UP
Route::get('/signup',[UserRegisteredController::class, 'signup']);
Route::post('/register', [UserRegisteredController::class, 'register']);

// DASHBOARD
Route::get('/dashboard',function(){
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// ACCOUNTS RECEIVABLE
Route::get('/accounts-receivable', [AccountReceivableController::class,'index'])->name('ar.index');
Route::get('/accounts-receivable/invoice', [AccountReceivableController::class,'invoice']);
Route::post('/ar-create', [AccountReceivableController::class, 'store'])->name('ar.store');
Route::get('/accounts-receivable/{id}', [AccountReceivableController::class,'view']);
Route::get('/accounts-receivable/edit/{id}', [AccountReceivableController::class,'edit']);
Route::patch('/accounts-receivable/edit/{id}', [AccountReceivableController::class,'edited']);
Route::delete('/accounts-receivable/{id}', [AccountReceivableController::class,'delete']);



// ACCOUNTS PAYABLE
Route::get('/accounts-payable', function(){
    return view('accounts-payable.index');
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




Route::get('/select', function(){
    return view('select-layout');
});
