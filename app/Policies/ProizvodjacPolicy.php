<?php

namespace App\Policies;

use App\User;
use App\Proizvodjac;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProizvodjacPolicy
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
     * Determine whether the user can update the proizvodjac.
     *
     * @param  \App\User  $user
     * @param  \App\Proizvodjac  $proizvodjac
     * @return boolean
     */
    public function update(User $user, Proizvodjac $proizvodjac)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the proizvodjac.
     *
     * @param  \App\User  $user
     * @param  \App\Proizvodjac  $proizvodjac
     * @return boolean
     */
    public function delete(User $user, Proizvodjac $proizvodjac)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
