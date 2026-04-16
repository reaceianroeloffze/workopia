<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class BookmarkController extends Controller
{
    /**
     * Display the saved jobs page of the
     * authenticated user.
     *
     * @route GET /bookmarks
     *
     * @return View <p>
     *     The view containing the saved jobs.
     * </p>
     * */
    public function index(): View
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the user's saved jobs
        $bookmarkedJobs = $user
            ->bookmarkedJobs()
            ->orderBy(
                'job_user_bookmarks.created_at',
                'desc'
            )
            ->paginate(9);

        return view('jobs.bookmarked')
            ->with('bookmarkedJobs', $bookmarkedJobs);
    }

    /**
     * Create new bookmarked jobs by the authenticated user.
     *
     * @route POST /bookmarks/{job}
     *
     * @param Job $job <p>
     *     The job listing to be bookmarked.
     * </p>
     *
     * @return RedirectResponse <p>
     *     Redirects the user to the saved jobs page upon successful bookmarking.
     * </p>
     * */
    public function store(Job $job): RedirectResponse
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the job is already bookmarked
        if (
            $user
                ->bookmarkedJobs()
                ->where('job_id', $job->id)
                ->exists()
        ) {
            return back()->with(
                'error',
                'You have already bookmarked this job.'
            );
        }

        // Create a new bookmark for the job
        $user->bookmarkedJobs()->attach($job->id);
        return back()->with(
            'success',
            'Job bookmarked successfully.'
        );
    }
}
