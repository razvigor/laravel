<?php

namespace App\Policies;

use App\User;
use App\Masina;
use Illuminate\Auth\Access\HandlesAuthorization;

class MasinaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the items.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can update the item.
     *
     * @param  \App\User  $user
     * @param  \App\Masina  $masina
     * @return boolean
     */
    public function update(User $user, Masina $masina)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the item.
     *
     * @param  \App\User  $user
     * @param  \App\Masina  $masina
     * @return boolean
     */
    public function delete(User $user, Masina $masina)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
