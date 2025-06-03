<?php

namespace App\Policies;

use App\User;
use App\Predracun;
use Illuminate\Auth\Access\HandlesAuthorization;

class PredracunPolicy
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
     * @param  \App\Predracun  $proizvod
     * @return boolean
     */
    public function update(User $user, Predracun $rnalog)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Predracun  $rnalog
     * @return boolean
     */
    public function delete(User $user, Predracun $rnalog)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
