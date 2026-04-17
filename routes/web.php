<?php

use App\Http\Controllers\{BookmarkController,
    DashboardController,
    LogoutController,
    JobController,
    HomeController,
    LoginController,
    RegisterController,
    ProfileController,
    ApplicantController,
};
use Illuminate\Support\Facades\Route;

// Route to home page
Route::get('/', [HomeController::class, 'index'])
    ->name('homepage');

// Routes to all job-related pages
Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
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

// Update User Profile
Route::put('/profile', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');

// Delete User Profile
Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->middleware('auth')
    ->name('profile.destroy');

// Bookmarked/Saved Jobs
Route::middleware('auth')
    ->group(
        function () {
            Route::get('/bookmarks', [BookmarkController::class, 'index'])
                ->name('bookmarks.index');
            Route::post('/bookmarks/{job}', [BookmarkController::class, 'store'])
                ->name('bookmarks.store');
            Route::delete('/bookmarks/{job}', [BookmarkController::class, 'destroy'])
                ->name('bookmarks.destroy');
        }
    );

// Apply for a job
Route::post('/jobs/{job}/apply', [ApplicantController::class, 'store'])
    ->middleware('auth')
    ->name('applicant.store');

// Delete an applicant
Route::delete('applicants/{applicant}', [ApplicantController::class, 'destroy'])->name('applicant.destroy');