<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Only admins can register users.
     */
    public function onlyAdmins(User $user): bool
    {
        return $user->isAdmin;
    }
}
