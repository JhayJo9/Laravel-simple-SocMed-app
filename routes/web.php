<?php

use App\Http\Controllers\AuhtController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
//use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'posts')->name('home');

Route::resource('post', PostController::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    Route::post('/', [AuhtController::class, 'logout'])->name('logout');    
});



// middlewre to safety
Route::middleware('guest')->group( function (){

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuhtController::class, 'register']); // from contoller
    
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuhtController::class, 'login']); // from controller
});

