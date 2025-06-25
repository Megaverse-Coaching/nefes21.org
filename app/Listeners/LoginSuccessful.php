<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Session;

class LoginSuccessful
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @param Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(Illuminate\Auth\Events\Login $event)
    {
        Session::flash('login-success', 'Hello ' . $event->user->name . ', welcome back!');
    }
}
