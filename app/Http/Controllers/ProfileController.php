<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );

        // Get user's name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete the old avatar if it exists
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }

            // Store the new avatar
            $avatarPath = $request
                ->file('avatar')
                ->store(
                    'avatars',
                    'public'
                );
            $user->avatar = $avatarPath;
        }

        // Update the user's profile information
        $user->save();

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Your profile information has been updated.'
            );
    }
}
