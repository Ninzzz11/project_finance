<?php

use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisteredController;
use Illuminate\Support\Facades\Route;

// LOGIN
Route::get('/',[UserLoginController::class, 'login'])->name('login');
Route::post('/login', [UserLoginController::class, 'create']);
Route::post('/logout',[UserLoginController::class, 'destroy'])->name('logout');

// SIGN UP
Route::get('/signup',[UserRegisteredController::class, 'signup']);
Route::post('/register', [UserRegisteredController::class, 'register']);

// DASHBOARD
Route::get('/dashboard',function(){
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// ACCOUNT RECEIVABLE
Route::get('/accounts-receivable', function(){
    return view('accounts-receivable.index');
});





Route::get('/select', function(){
    return view('select');
});
