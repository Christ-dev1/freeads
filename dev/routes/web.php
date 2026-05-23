<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdController; 
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', [AdController::class, 'index'])->name('ads.index');
Route::get('/header', function () {
    return view('auth.header');
})->name('header');

Route::middleware('guest')->group(function () {
    Route::get('/sign-up', [AuthController::class, 'showFormSignUp'])->name('sign-up');
    Route::post('/sign-up', [AuthController::class, 'SignUp'])->name('registration.sign-up');
    
    Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'Login'])->name('login.signin');
});


Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/welcome-user', function () {
        return view('welcomemail');
    })->name('welcomemail');

    Route::get('/userpage', [UserController::class, 'showProfile'])->name('auth.userpage');
    
    Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
    Route::post('/ads/store', [AdController::class, 'store'])->name('ads.store');
    Route::get('/ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
    Route::put('/ads/{ad}', [AdController::class, 'update'])->name('ads.update');
    Route::delete('/ads/{ad}', [AdController::class, 'destroy'])->name('ads.destroy');
    Route::get('/ads-liste', [AdController::class, 'list'])->name('ads.liste');
    Route::get('/ads/{ad}', [AdController::class, 'show'])->name('ads.show');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
