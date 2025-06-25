<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Front\User;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return View
     */
    public function create(): View
    {
        return (Auth::guard('admin')->check()) ? view('admin.auth.forgot-password') : view('front.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }

    /**
     * Handle an incoming api password reset link request.
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws ValidationException
     */
    public function apiStore(Request $request): Response
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if(Auth::guard('web')->check()) $user = User::where('email', $request->email)->first();
        if(Auth::guard('admin')->check()) $user = Admin::where('email', $request->email)->first();

        if(!$user){
            throw ValidationException::withMessages([
                'email' => ['User with such email doesn\'t exist']
            ]);
        }

        return response('Password reset email successfully sent.');
    }
}
