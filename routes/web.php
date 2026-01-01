<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware(['guest'])->group(function () {
    Route::get('/sign-in', [AuthController::class, 'showSignIn'])->name('sign-in');
    Route::get('/sign-up', [AuthController::class, 'showSignUp'])->name('sign-up');
    
    Route::post('/sign-in', [AuthController::class, 'signIn'])->name('sign-in.post');
    Route::post('/sign-up', [AuthController::class, 'signUp'])->name('sign-up.post');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return redirect('/sign-in');
});