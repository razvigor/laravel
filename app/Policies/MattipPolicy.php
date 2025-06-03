<?php

namespace App\Policies;

use App\User;
use App\Mattip;
use Illuminate\Auth\Access\HandlesAuthorization;

class MattipPolicy
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
     * Determine whether the user can update the mattip.
     *
     * @param  \App\User  $user
     * @param  \App\Mattip  $mattip
     * @return boolean
     */
    public function update(User $user, Mattip $mattip)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the mattip.
     *
     * @param  \App\User  $user
     * @param  \App\Mattip  $mattip
     * @return boolean
     */
    public function delete(User $user, Mattip $mattip)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
