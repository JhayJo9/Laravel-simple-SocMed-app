<?php

use App\Http\Controllers\AuhtController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'post.index')->name('home');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuhtController::class, 'register']); // from contoller

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuhtController::class, 'login']); // from controller