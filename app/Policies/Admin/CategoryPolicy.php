<?php

namespace App\Policies\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Request;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Admin can view any models.
     *
     * @param Admin $admin
     * @return Response|bool
     */
    public function viewAny(Admin $admin): Response|bool
    {
        if($admin->hasAnyRole('admin', 'root')) return true;
    }

    /**
     * Determine whether the Admin can view the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Category $category
     * @return void
     */
    public function view(Request $request, Admin $admin, Category $category): void
    {
        if ($request->user()->cannot('read', $category))  abort(403);
    }

    /**
     * Determine whether the Admin can create models.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Category $category
     * @return void
     */
    public function create(Request $request, Admin $admin, Category $category): void
    {
        if ($request->user()->cannot('create', $category))  abort(403);
    }

    /**
     * Determine whether the Admin can update the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Category $category
     * @return void
     */
    public function update(Request $request, Admin $admin, Category $category): void
    {
        if ($request->user()->cannot('update', $category))  abort(403);
    }

    /**
     * Determine whether the Admin can delete the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Category $category
     * @return void
     */
    public function delete(Request $request, Admin $admin, Category $category): void
    {
        if ($request->user()->cannot('delete', $category))  abort(403);
    }

    /**
     * Determine whether the Admin can restore the model.
     *
     * @param Admin $admin
     * @param Category $category
     * @return Response|bool
     */
    public function restore(Admin $admin, Category $category): Response|bool
    {
        //
    }

    /**
     * Determine whether the Admin can permanently delete the model.
     *
     * @param Admin $admin
     * @param Category $category
     * @return Response|bool
     */
    public function forceDelete(Admin $admin, Category $category): Response|bool
    {
        //
    }
}
