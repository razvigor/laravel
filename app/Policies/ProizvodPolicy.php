<?php

namespace App\Policies;

use App\User;
use App\Proizvod;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProizvodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the proizvod.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can create proizvod.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isCreator();// 
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\User  $user
     * @param  \App\Proizvod  $proizvod
     * @return boolean
     */
    public function update(User $user, Proizvod $proizvod)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Proizvod  $proizvod
     * @return boolean
     */
    public function delete(User $user, Proizvod $proizvod)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
