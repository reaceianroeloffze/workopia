<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return redirect()->route('jobs.index');
    }
}
