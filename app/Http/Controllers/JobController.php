<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jobs = Job::all();

        return view(
            'jobs.index'
        )->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request <p>
     *     The request object containing the validated data.
     * </p>
     *
     * @return RedirectResponse <p>
     *     A redirect response to the jobs index page with a success message.
     * </p>
     * */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'is_remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'nullable|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_website' => 'nullable|url',
        ]);

        // Hardcoded user ID for now
        $validatedData['user_id'] = 1;

        // Check for image
        if ($request->hasFile('company_logo')) {
            // Store the image file and get the path
            $imagePath = $request->file('company_logo')->store('logos', 'public');

            // Add the image path to the validated data
            $validatedData['company_logo'] = $imagePath;
        }

        // Submit to database
        Job::create($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job listing created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Job $job <p>
     *     The job listing to be displayed.
     * </p>
     *
     * @return View <p>
     *     The view for displaying the job listing.
     * </p>
     * */
    public function show(Job $job): View
    {
        return view('jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Job $job <p>
     *     The job listing to be edited.
     * </p>
     *
     * @return View <p>
     *     The view for editing the job listing.
     * </p>
     * */
    public function edit(Job $job): View
    {
        return view('jobs.edit')->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request <p>
     *     The request object containing the validated data.
     * </p>
     * @param Job $job <p>
     *     The job listing to be updated.
     * </p>
     *
     * @return RedirectResponse <p>
     *     A redirect response to the jobs index page with a success message.
     * </p>
     * */
    public function update(Request $request, Job $job): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'is_remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'nullable|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_website' => 'nullable|url',
        ]);

        // Check for image
        if ($request->hasFile('company_logo')) {
            // Delete the old image if it exists
            Storage::disk('public')->delete($job->company_logo);

            // Store the image file and get the path
            $imagePath = $request->file('company_logo')->store('logos', 'public');

            // Add the image path to the validated data
            $validatedData['company_logo'] = $imagePath;
        }

        // Submit to database
        $job->update($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Job $job <p>
     *     The job listing to be deleted.
     * </p>
     *
     * @return RedirectResponse <p>
     *     A redirect response to the jobs index page with a success message.
     * </p>
     * */
    public function destroy(Job $job): RedirectResponse
    {
        // If there's a logo, delete it
        if ($job->company_logo) {
            Storage::disk('public')->delete($job->company_logo);
        }

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job listing deleted successfully.');
    }
}
