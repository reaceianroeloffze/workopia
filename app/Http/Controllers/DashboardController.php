<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard page of the authenticated user.
     *
     * @route GET /dashboard
     * */
    public function index(): View
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the job listings of the authenticated user
        $jobs = Job::where('user_id', $user->id)->get();

        return view('dashboard.index', compact('user', 'jobs'));
    }
}
