<?php

namespace App\Policies\Admin;

use App\Models\Admin\Admin;
use App\Models\Admin\Dimension;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Request;

class DimensionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param Admin $admin
     * @return Response|bool
     */
    public function viewAny(Admin $admin): Response|bool
    {
        if($admin->hasAnyRole('admin', 'root')) return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Dimension $dimension
     * @return Response|bool
     */
    public function view(Request $request, Admin $admin, Dimension $dimension): Response|bool
    {
        if ($request->user()->cannot('read', $dimension))  abort(403);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Dimension $dimension
     * @return Response|bool
     */
    public function create(Request $request, Admin $admin, Dimension $dimension): Response|bool
    {
        if ($request->user()->cannot('create', $dimension))  abort(403);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Dimension $dimension
     * @return Response|bool
     */
    public function update(Request $request, Admin $admin, Dimension $dimension): Response|bool
    {
        if ($request->user()->cannot('update', $dimension))  abort(403);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Dimension $dimension
     * @return Response|bool
     */
    public function delete(Request $request, Admin $admin, Dimension $dimension): Response|bool
    {
        if ($request->user()->cannot('delete', $dimension)) abort(403);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  Admin $admin
     * @param Dimension $dimension
     * @return Response|bool
     */
    public function restore(Admin $admin, Dimension $dimension)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  Admin $admin
     * @param Dimension $dimension
     * @return Response|bool
     */
    public function forceDelete(Admin $admin, Dimension $dimension)
    {
        //
    }
}
