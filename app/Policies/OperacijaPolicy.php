<?php

namespace App\Policies;

use App\User;
use App\Operacija;
use Illuminate\Auth\Access\HandlesAuthorization;

class OperacijaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the categories.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isCreator();// 
    }

    /**
     * Determine whether the user can update the operacija.
     *
     * @param  \App\User  $user
     * @param  \App\Operacija  $operacija
     * @return boolean
     */
    public function update(User $user, Operacija $operacija)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the operacija.
     *
     * @param  \App\User  $user
     * @param  \App\Operacija  $operacija
     * @return boolean
     */
    public function delete(User $user, Operacija $operacija)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
