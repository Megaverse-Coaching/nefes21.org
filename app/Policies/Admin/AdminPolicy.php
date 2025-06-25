<?php

namespace App\Policies\Admin;

use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param Admin $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param Admin $user
     * @param Admin $model
     * @return mixed
     */
    public function view(Admin $user, Admin $model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param Admin $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Admin $user
     * @param Admin $model
     * @return mixed
     */
    public function update(Admin $user, Admin $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Admin $user
     * @param Admin $model
     * @return mixed
     */
    public function delete(Admin $user, Admin $model)
    {
        return $user->is($model);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param Admin $user
     * @param Admin $model
     * @return mixed
     */
    public function restore(Admin $user, Admin $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param Admin $user
     * @param Admin $model
     * @return mixed
     */
    public function forceDelete(Admin $user, Admin $model)
    {
        //
    }
}
