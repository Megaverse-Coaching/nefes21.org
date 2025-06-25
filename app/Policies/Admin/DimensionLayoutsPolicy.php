<?php

namespace App\Policies\Admin;

use App\Models\Admin\DimensionLayouts;
use App\Models\Front\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DimensionLayoutsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Front\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Front\User  $user
     * @param  \App\Models\Admin\DimensionLayouts  $dimensionLayouts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DimensionLayouts $dimensionLayouts)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Front\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Front\User  $user
     * @param  \App\Models\Admin\DimensionLayouts  $dimensionLayouts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DimensionLayouts $dimensionLayouts)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Front\User  $user
     * @param  \App\Models\Admin\DimensionLayouts  $dimensionLayouts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DimensionLayouts $dimensionLayouts)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Front\User  $user
     * @param  \App\Models\Admin\DimensionLayouts  $dimensionLayouts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DimensionLayouts $dimensionLayouts)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Front\User  $user
     * @param  \App\Models\Admin\DimensionLayouts  $dimensionLayouts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DimensionLayouts $dimensionLayouts)
    {
        //
    }
}
