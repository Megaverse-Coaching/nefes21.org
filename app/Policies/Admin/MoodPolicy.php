<?php

namespace App\Policies\Admin;

use App\Models\Admin\Admin;
use App\Models\Admin\Mood;
use Illuminate\Auth\Access\{HandlesAuthorization, Response};

class MoodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Admin can view any models.
     *
     * @param Admin $admin
     * @return Response|bool
     */
    public function viewAny(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the Admin can view the model.
     *
     * @param Admin $admin
     * @param Mood $mood
     * @return Response|bool
     */
    public function view(Admin $admin, Mood $mood)
    {
        //
    }

    /**
     * Determine whether the Admin can create models.
     *
     * @param Admin $admin
     * @return Response|bool
     */
    public function create(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the Admin can update the model.
     *
     * @param Admin $admin
     * @param Mood $mood
     * @return Response|bool
     */
    public function update(Admin $admin, Mood $mood)
    {
        //
    }

    /**
     * Determine whether the Admin can delete the model.
     *
     * @param Admin $admin
     * @param Mood $mood
     * @return Response|bool
     */
    public function delete(Admin $admin, Mood $mood)
    {
        //
    }

    /**
     * Determine whether the Admin can restore the model.
     *
     * @param Admin $admin
     * @param Mood $mood
     * @return Response|bool
     */
    public function restore(Admin $admin, Mood $mood)
    {
        //
    }

    /**
     * Determine whether the Admin can permanently delete the model.
     *
     * @param Admin $admin
     * @param Mood $mood
     * @return Response|bool
     */
    public function forceDelete(Admin $admin, Mood $mood)
    {
        //
    }
}
