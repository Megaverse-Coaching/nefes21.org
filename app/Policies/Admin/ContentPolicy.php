<?php

namespace App\Policies\Admin;

use App\Models\Admin\Content;
use App\Models\Admin\Admin;
use Arr;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Role;

class ContentPolicy
{
    use HandlesAuthorization;


    /**
     * Perform pre-authorization checks.
     *
     * @param Admin $user
     * @param string $ability
     * @return Response
     */
    public function before(Admin $user, string $ability)
    {

//        return true;
//        $user->isAdministrator() === 'root' ? Response::allow() : Response::deny('You do not own this before.');
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param Admin $user
     * @return Response|bool
     */
    public function viewAny(Admin $user)
    {

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param Admin $user
     * @param Content $content
     * @return Response|bool
     */
    public function view(Admin $user, Content $content)
    {
        return in_array('read content', $user->permission, true);

    }

    /**
     * Determine whether the user can create models.
     *
     * @param Admin $user
     * @return Response|bool
     */
    public function create(Admin $user)
    {
        return in_array('create content', $user->permission, true);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Admin $user
     * @return Response|bool
     */
    public function update(Admin $user)
    {
        $userRoles = Auth::user()->roles->pluck('name')->toArray();
        if($user->hasAnyRole($userRoles)){
            $permissions = [];
            foreach ($userRoles as $role){
                $pmis = Role::findByName($role)->permissions->pluck('name')->toArray();
                $permissions = Arr::add($permissions, $role, $pmis);
            }
        }
        return in_array('update content', $permissions, true);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Admin $user
     * @return Response|bool
     */
    public function delete(Admin $user)
    {
        $userRoles = Auth::user()->roles->pluck('name')->toArray();
        if($user->hasAnyRole($userRoles)){
            $permissions = [];
            foreach ($userRoles as $role){
                $pmis = Role::findByName($role)->permissions->pluck('name')->toArray();
                $permissions = Arr::add($permissions, $role, $pmis);
            }
        }

        dd($permissions);
        return in_array('delete content', $permissions, true);

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param Admin $user
     * @param Content $content
     * @return Response|bool
     */
    public function restore(Admin $user, Content $content)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param Admin $user
     * @param Content $content
     * @return Response|bool
     */
    public function forceDelete(Admin $user, Content $content)
    {
        //
    }
}
