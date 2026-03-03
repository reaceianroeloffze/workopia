<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;

// Route to home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route to jobs
Route::resource('jobs', JobController::class);
