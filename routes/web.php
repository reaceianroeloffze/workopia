<?php

use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Route to home page
Route::get('/', [HomeController::class, 'index'])->name('homepage');

// Routes to all job-related pages
Route::resource('jobs', JobController::class);

/*
    Login and Registration Routes
*/

// Register page
Route::get('/register', [RegisterController::class, 'register'])->name('register');
// Processing registration data
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
// Login page
Route::get('/login', [LoginController::class, 'login'])->name('login');
// Authenticate user logins
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
