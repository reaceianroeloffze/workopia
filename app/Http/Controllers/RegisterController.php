<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return redirect()->route('login');
    }
}
