<?php

namespace App\Policies;

use App\User;
use App\Masinlokacija;
use Illuminate\Auth\Access\HandlesAuthorization;

class MasinlokacijaPolicy
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
     * Determine whether the user can update the category.
     *
     * @param  \App\User  $user
     * @param  \App\Masinlokacija  $masinlokacija
     * @return boolean
     */
    public function update(User $user, Masinlokacija $masinlokacija)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Masinlokacija  $masinlokacija
     * @return boolean
     */
    public function delete(User $user, Masinlokacija $masinlokacija)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
