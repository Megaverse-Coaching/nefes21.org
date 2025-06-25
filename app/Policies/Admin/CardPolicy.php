<?php

namespace App\Policies\Admin;

use App\Models\Admin\Admin;
use App\Models\Admin\Card;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Request;

class CardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param Admin $admin
     * @return bool
     */
    public function viewAny(Admin $admin): bool
    {
        if($admin->hasAnyRole('admin', 'root')) return true;
    }

    /**
     * Determine whether the user can view the model.
     * @param Request $request
     * @param Admin $admin
     * @param Card $card
     * @return void
     */
    public function view(Request $request, Admin $admin, Card $card): void
    {
        if ($request->user()->cannot('read', $card))  abort(403);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Card $card
     * @return void
     */
    public function create(Request $request, Admin $admin, Card $card): void
    {
        if ($request->user()->cannot('create', $card))  abort(403);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Card $card
     * @return void
     */
    public function update(Request $request, Admin $admin, Card $card): void
    {
        if ($request->user()->cannot('update', $card))  abort(403);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Card $card
     * @return void
     */
    public function delete(Request $request, Admin $admin, Card $card): void
    {
        if ($request->user()->cannot('delete', $card))  abort(403);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  Admin  $admin
     * @param Card $card
     * @return Response|bool
     */
    public function restore(Admin $admin, Card $card)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  Admin  $admin
     * @param Card $card
     * @return Response|bool
     */
    public function forceDelete(Admin $admin, Card $card)
    {
        //
    }
}
