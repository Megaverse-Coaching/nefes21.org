<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request): mixed
    {
        return Auth::guard('admin')->check() ? ($request->user()->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::ADMIN)
            : view('admin.auth.verify-email')) : ($request->user()->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::HOME)
            : view('front.auth.verify-email'));

    }
}
