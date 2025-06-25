<?php

namespace App\Observers;

use App\Models\Admin\Admin;

class UserObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;


    /**
     * Handle the User "created" event.
     *
     *
     * @param Admin $user
     * @return void
     */
    public function created(Admin $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param Admin $user
     * @return void
     */
    public function updated(Admin $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param Admin $user
     * @return void
     */
    public function deleted(Admin $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param Admin $user
     * @return void
     */
    public function restored(Admin $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param Admin $user
     * @return void
     */
    public function forceDeleted(Admin $user)
    {
        //
    }
}
