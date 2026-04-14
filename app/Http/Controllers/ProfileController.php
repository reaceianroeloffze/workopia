<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Update user profile information.
     *
     * @route PUT /profile
     *
     * @param Request $request <p>
     *     The request object containing the user profile information.
     * </p>
     *
     * @return RedirectResponse <p>
     *     Redirects the user to the dashboard page with a success message.
     * </p>
     * */
    public function update(Request $request): RedirectResponse
    {
        // Get the logged-in user
        $user = Auth::user();

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
        ]);

        // Update the user's profile information
        $user->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Your profile information has been updated.');
    }
}
