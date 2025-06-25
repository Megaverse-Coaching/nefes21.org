<?php

namespace App\Policies\Front;

use App\Models\Admin\Admin;
use App\Models\Front\Home;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class HomePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param Admin $user
     * @return Response|bool
     */
    public function viewAny(Admin $user): Response|bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param Admin $user
     * @param Home $home
     * @return Response|bool
     */
    public function view(Admin $user, Home $home): Response|bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param Admin $user
     * @return Response|bool
     */
    public function create(Admin $user): Response|bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Admin $user
     * @param Home $home
     * @return Response|bool
     */
    public function update(Admin $user, Home $home): Response|bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Admin $user
     * @param Home $home
     * @return Response|bool
     */
    public function delete(Admin $user, Home $home): Response|bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param Admin $user
     * @param Home $home
     * @return Response|bool
     */
    public function restore(Admin $user, Home $home): Response|bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param Admin $user
     * @param Home $home
     * @return Response|bool
     */
    public function forceDelete(Admin $user, Home $home)
    {
        //
    }
}
