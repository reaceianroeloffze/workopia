<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * Renders the user registration page
     *
     * @route GET /register
     *
     * @return View <p>
     *     The view containing the user registration form.
     * </p>
     * */
    public function register(): View
    {
        return view('auth.register');
    }

    /**
     * Submit and store user registration data
     *
     * @param Request $request <p>
     *     The request containing the user registration data.
     * </p>
     *
     * @return RedirectResponse <p>
     *     Redirects the user to the login page upon successful registration.
     * </p>
     * */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create user
        User::create($validatedData);

        return redirect()->route('login')->with(
            'success',
            $validatedData['name'] . 'Registration successful! You can now log in.'
        );
    }
}
