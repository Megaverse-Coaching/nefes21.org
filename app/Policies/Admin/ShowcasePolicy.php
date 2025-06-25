<?php

namespace App\Policies\Admin;

use App\Models\Admin\Admin;
use App\Models\Admin\Showcase;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Request;

class ShowcasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Showcase $showcase
     * @return void
     */
    public function viewAny(Request $request, Admin $admin, Showcase $showcase): void
    {
        if ($request->user()->cannot('update', $showcase))  abort(403);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Showcase $showcase
     * @return void
     */
    public function view(Request $request, Admin $admin, Showcase $showcase): void
    {
        if ($request->user()->cannot('read', $showcase))  abort(403);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Showcase $showcase
     * @return void
     */
    public function create(Request $request, Admin $admin, Showcase $showcase): void
    {
        if ($request->user()->cannot('create', $showcase))  abort(403);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Showcase $showcase
     * @return void
     */
    public function update(Request $request, Admin $admin, Showcase $showcase): void
    {
        if ($request->user()->cannot('update', $showcase))  abort(403);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Showcase $showcase
     * @return void
     */
    public function delete(Request $request, Admin $admin, Showcase $showcase): void
    {
        if ($request->user()->cannot('delete', $showcase))  abort(403);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param Admin $admin
     * @param Showcase $showcase
     * @return Response|bool
     */
    public function restore(Admin $admin, Showcase $showcase)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param Admin $admin
     * @param Showcase $showcase
     * @return Response|bool
     */
    public function forceDelete(Admin $admin, Showcase $showcase)
    {
        //
    }
}
