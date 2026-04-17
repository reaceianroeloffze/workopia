<?php

namespace App\Http\Controllers;

use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\Mail;
use App\Models\{Job, Applicant};
use App\Mail\JobApplied;

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
     *     Redirects the user to the Dashboard page with an appropriate message.
     * </p>
     */
    public function store(Request $request, Job $job): RedirectResponse
    {
        // Check if the user has already applied for a job
        $existingApplication = Applicant::where('job_id', $job->id)
            ->where('user_id', auth()->id())
            ->exists();

        if ($existingApplication) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'You have already applied for this job.'
                );
        }

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

        // Send email notification to the job owner
        Mail::to($job->user->email)->send(new JobApplied($application, $job));

        return redirect()->back()->with(
            'success',
            'Your application for ' . $job->title . ' has been submitted successfully.'
        );
    }

    /**
     * Delete/destroy an applicant
     *
     * @route DELETE /applicants/{applicant}
     *
     * @param int $id <p>
     *     The id of the applicant to be deleted.
     * </p>
     *
     * @return RedirectResponse <p>
     *     Redirects the user to the dashboard page with an appropriate message.
     * */
    public function destroy(int $id): RedirectResponse
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return redirect()->route('dashboard')->with(
            'success',
            'Applicant ' . $applicant->full_name . ' deleted successfully.'
        );
    }
}
