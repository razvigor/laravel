<?php

namespace App\Policies;

use App\User;
use App\Element;
use Illuminate\Auth\Access\HandlesAuthorization;

class ElementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the element.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can create element.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isCreator();// 
    }

    /**
     * Determine whether the user can update the element.
     *
     * @param  \App\User  $user
     * @param  \App\Element  $element
     * @return boolean
     */
    public function update(User $user, Element $element)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the element.
     *
     * @param  \App\User  $user
     * @param  \App\Element  $element
     * @return boolean
     */
    public function delete(User $user, Element $element)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
