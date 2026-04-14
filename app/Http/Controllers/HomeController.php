<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Render the home page
     *
     * @route GET /
     *
     * @return View <p>
     *     The view containing the home page.
     * </p>
     * */
    public function index(): View
    {
        $jobs = Job::latest()
            ->limit(6)
            ->get();
        return view('pages.index')
            ->with(
                'jobs',
                $jobs
            );
    }
}
