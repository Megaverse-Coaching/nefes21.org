<?php

namespace App\Policies\Admin;

use App\Models\Admin\Track;
use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TrackPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param Admin $user
     * @param string $ability
     * @return Response
     */
    public function before(Admin $user, string $ability)
    {
        return true;
        //$user->isAdministrator() === 'admin' ? Response::allow() : Response::deny('You do not own this before.');
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param Admin $user
     * @return Response|bool
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param Admin $user
     * @param Track $track
     * @return Response|bool
     */
    public function view(Admin $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param Admin $user
     * @return Response|bool
     */
    public function create(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Admin $user
     * @param Track $track
     * @return Response|bool
     */
    public function update(Admin $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Admin $user
     * @param Track $track
     * @return Response|bool
     */
    public function delete(Admin $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param Admin $user
     * @param Track $track
     * @return Response|bool
     */
    public function restore(Admin $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param Admin $user
     * @param Track $track
     * @return Response|bool
     */
    public function forceDelete(Admin $user, Track $track)
    {
        //
    }
}
