<?php

namespace App\Http\Controllers\Front\Home;

use App\Http\Controllers\Controller;
use App\Mail\TestingMail;
use App\Models\Front\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Mail;
use Spatie\Permission\Models\Role;

class EmailController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::select(['id', 'first_name'])->with(['roles'])->first();

//        return new TestingMail($user);

        Mail::to('studiosofgraf@gmail.com')->send(new TestingMail($user));

        $data = [];

        return view('front.home.email', [
           'user' => $user,
           'logins' => Login::take(10)->latest('logged_in_at')->get(),
           'roles' => Role::get(['id', 'name']),
           ...$data
        ]);
    }
}
