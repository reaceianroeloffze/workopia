<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Log the user out of the application.
     *
     * 1. Invalidates the user's session.
     * 2. Regenerates the CSRF token.
     * 3. Redirects the user to the login page.
     *
     * @route POST /logout
     *
     * @param Request $request <p>
     *     The request object containing the user's session.
     * </p>
     *
     * @return RedirectResponse <p>
     *     Redirects the user to the login page upon successful logout.
     * </p>
     * */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request
            ->session()
            ->invalidate();
        $request
            ->session()
            ->regenerateToken();

        return redirect()
            ->route('homepage')
            ->with(
                'success',
                'You are now logged out.'
            );
    }
}
