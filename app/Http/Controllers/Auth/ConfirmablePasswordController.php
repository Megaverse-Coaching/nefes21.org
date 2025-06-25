<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     *
     * @return View
     */
    public function show(): View
    {
        return (Auth::guard('admin')->check()) ? view('admin.auth.confirm-password') : view('front.auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if(Auth::guard('admin')->check()){
            if (!Auth::guard('admin')->validate([
                'email'    => $request->user()->email,
                'password' => $request->password,
            ])) {
                throw ValidationException::withMessages(['password' => __('admin.auth.password'),]);
            }
        }else{
            if (!Auth::guard('web')->validate([
                'email'    => $request->user()->email,
                'password' => $request->password,
            ])) {
                throw ValidationException::withMessages(['password' => __('front.auth.password'),]);
            }
        }

        $request->session()->put('auth.password_confirmed_at', time());
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
