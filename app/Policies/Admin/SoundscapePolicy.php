<?php

namespace App\Policies\Admin;

use App\Models\Admin\Soundscape;
use App\Models\Admin\Admin;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class SoundscapePolicy
{
    use HandlesAuthorization;

    public function before(Admin $user){
        if($user->hasAnyRole('admin', 'manager')){
            return true;
        }
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
     * @param Soundscape $soundscape
     * @return Response|bool
     */
    public function view(Admin $user, Soundscape $soundscape)
    {
        if ($soundscape->created_at) {
            return true;
        }

        // visitors cannot view unpublished items
        if ($user === null) {
            return false;
        }

        // admin overrides published status
        if ($user->can('read soundscape')) {
            return true;
        }

        // authors can view their own unpublished posts
        return $user->id == $soundscape->created_by;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param Admin $user
     * @return Response|bool
     */
    public function create(Admin $user)
    {
        if ($user->can('create soundscape')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Admin $user
     * @param Soundscape $soundscape
     * @return Response|bool
     */
    public function update(Admin $user, Soundscape $soundscape)
    {
//        if ($user->can('update soundscape')) {
//            return $user->id == $soundscape->created_by;
//        }

        if ($user->can('update soundscape')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Admin $user
     * @param Soundscape $soundscape
     * @return Response|bool
     */
    public function delete(Admin $user, Soundscape $soundscape)
    {
        if ($user->can('delete soundscape')) {
            return $user->id == $soundscape->created_by;
        }

        if ($user->can('delete soundscape')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param Admin $user
     * @param Soundscape $soundscape
     * @return Response|bool
     */
    public function restore(Admin $user, Soundscape $soundscape)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param Admin $user
     * @param Soundscape $soundscape
     * @return Response|bool
     */
    public function forceDelete(Admin $user, Soundscape $soundscape)
    {
        //
    }
}
