<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Front\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create()
    {
        return (str_contains(url()->current(), 'admin/register')) ? view('admin.auth.register') : view('front.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $customValidationMessages = [
            'token.required' => 'No token no honey!',
            'email.required' => 'Who goes there?! Please ensure you provide an email address.',
            'email.email' => 'The :attribute value :input is not a valid email. Make it right and try again!', //notice here we are using dynamic values provided by the form submission.
            'password.required' => 'We thought you wanted to change your password. Please provide a new password.',
            'password.min' => 'Please provide a password at least 6 characters long. Your account will be safer this way!',
            'password.confirm' => 'Nope! You did not confirm you want to use that password. Please confirm your password.'
        ];

      $request->validate([
            'first_name' => 'required|string|max:64',
            'last_name'  => 'required|string|max:64',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => ['required', 'confirmed', 'min:6'],
        ], $customValidationMessages);

        $user = Auth::guard('admin')->check() ?
            Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]) : User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

//        $response = Mail::to("a.gundal92@gmail.com")->send(new NewUserWelcomeMail($user));



        return (Auth::guard('admin')->check()) ?
            redirect("/admin", 301) :
            redirect("/pro", 301);
    }


    /**
     * Handle an incoming api registration request.
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws ValidationException
     */
    public function apiStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => ['required', 'confirmed', Password::defaults()],
        ]);

        $token = Str::random(60);
        $user = Admin::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'api_token' => hash('sha256', $token),
        ]);

        return response($user);
    }
}
