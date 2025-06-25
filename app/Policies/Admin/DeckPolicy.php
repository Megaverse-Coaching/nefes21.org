<?php

namespace App\Policies\Admin;

use App\Models\Admin\Deck;
use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Request;

class DeckPolicy
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
     * @param Deck $deck
     * @return Response|bool
     */
    public function view(Request $request, Admin $admin, Deck $deck): Response|bool
    {
        if ($request->user()->cannot('read', $deck))  abort(403);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Deck $deck
     * @return Response|bool
     */
    public function create(Request $request, Admin $admin, Deck $deck): Response|bool
    {
        if ($request->user()->cannot('create', $deck))  abort(403);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Deck $deck
     * @return Response|bool
     */
    public function update(Request $request, Admin $admin, Deck $deck): Response|bool
    {
        if ($request->user()->cannot('update', $deck))  abort(403);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Request $request
     * @param Admin $admin
     * @param Deck $deck
     * @return Response|bool
     */
    public function delete(Request $request, Admin $admin, Deck $deck): Response|bool
    {
        if ($request->user()->cannot('delete', $deck))  abort(403);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param Admin $admin
     * @param Deck $deck
     * @return void
     */
    public function restore(Admin $admin, Deck $deck)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param Admin $admin
     * @param Deck $deck
     * @return void
     */
    public function forceDelete(Admin $admin, Deck $deck)
    {
        //
    }
}
