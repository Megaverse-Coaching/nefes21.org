<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param EmailVerificationRequest $request
     *
     * @return RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if(Auth::guard('admin')->check()){
            if ($request->user()->hasVerifiedEmail()) return redirect()->intended(RouteServiceProvider::ADMIN.'?verified=1');
        }else{
            if ($request->user()->hasVerifiedEmail()) return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }
        if ($request->user()->markEmailAsVerified()) event(new Verified($request->user()));

        return redirect()->intended((Auth::guard('admin') ? RouteServiceProvider::ADMIN.'?verified=1' : RouteServiceProvider::HOME.'?verified=1'));
    }
}
