<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Render the user login page
     *
     * @route GET /login
     *
     * @return View <p>
     *     The view containing the user login form.
     * </p>
     * */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * Authenticate an attempted login
     *
     * @param Request $request <p>
     *     The request containing the user login data.
     * </p>
     *
     * @return RedirectResponse <p>
     *     Redirects the user to the jobs index page upon successful login.
     * </p>
     * */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            $user = Auth::user();

            return redirect()->intended(route('jobs.index'))->with(
                'success',
                'Successfully logged in as ' . $user->name
            );
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }
}
