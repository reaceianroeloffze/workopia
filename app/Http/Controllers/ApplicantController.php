<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    /**
     * Store a new job application in the database.
     *
     * @param Request $request <p>
     *     The request object containing the applicant data.
     * </p>
     *
     * @route POST /jobs/{job}/apply
     *
     * @return RedirectResponse <p>
     *     Redirects the user to the job details page with an appropriate message.
     * </p>
     */
    public function store(Request $request, Job $job): RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate(
            [
                'full_name' => 'required|string|max:255',
                'contact_phone' => 'nullable|string|max:20',
                'contact_email' => 'required|string|email',
                'message' => 'nullable|string|max:2000',
                'location' => 'nullable|string|max:255',
                'resume' => 'required|file|mimes:pdf|max:2048',
            ]
        );
        // Handle resume upload
        if ($request->hasFile('resume')) {
            $path = $request
                ->file('resume')
                ->store('resumes', 'public');
            $validatedData['resume_path'] = $path;
        }

        // Store the application in the database
        $application = new Applicant($validatedData);
        $application->job_id = $job->id;
        $application->user_id = auth()->id();
        $application->save();

        return redirect()->back()->with(
            'success',
            'Your application for ' . $job->title . ' has been submitted successfully.'
        );

    }
}
