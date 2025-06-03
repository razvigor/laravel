<?php

namespace App\Policies;

use App\User;
use App\Mtag;
use Illuminate\Auth\Access\HandlesAuthorization;

class MtagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the tags.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can create tags.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can update the mtag.
     *
     * @param  \App\User  $user
     * @param  \App\Mtag  $mtag
     * @return boolean
     */
    public function update(User $user, Mtag $mtag)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the mtag.
     *
     * @param  \App\User  $user
     * @param  \App\Mtag  $mtag
     * @return boolean
     */
    public function delete(User $user, Mtag $mtag)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
