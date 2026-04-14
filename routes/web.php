<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Route to home page
Route::get('/', [HomeController::class, 'index'])
    ->name('homepage');

// Routes to all job-related pages
// Route::resource('jobs', JobController::class);
Route::resource('jobs', JobController::class)
    ->middleware('auth')
    ->only(
        [
            'create',
            'edit',
            'update',
            'destroy',
        ]
    );
Route::resource('jobs', JobController::class)
    ->except(
        [
            'create',
            'edit',
            'update',
            'destroy',
        ]
    );

/*
    Login and Registration Routes
*/

Route::middleware('guest')->group(function () {
    // Register page
    Route::get('/register', [RegisterController::class, 'register'])
        ->name('register');

    // Processing registration data
    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');

    // Login page
    Route::get('/login', [LoginController::class, 'login'])
        ->name('login')
        ->middleware('guest');

    // Authenticate user logins
    Route::post('/login', [LoginController::class, 'authenticate'])
        ->name('login.authenticate');
});

// Logout
Route::post('/logout', [LogoutController::class, 'logout'])
    ->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');
