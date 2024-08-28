<?php

use App\Http\Controllers\AuhtController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

Route::redirect('/', 'posts')->name('posts');

Route::resource('posts', PostController::class);

Route::get('/users/posts', [DashboardController::class, 'userPosts'])->name('posts.user');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    Route::post('/logout', [AuhtController::class, 'logout'])->name('logout');
});



// middleware to safety
Route::middleware('guest')->group( function (){

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuhtController::class, 'register']); // from contoller

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuhtController::class, 'login']); // from controller
});

