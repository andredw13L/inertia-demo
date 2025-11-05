<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->email === "test@example1234.com";
    }


    /**
     * Determine whether the user can edit models.
     */
    public function edit(User $user, User $model): bool
    {

        // Random accept/deny like a coin flip
        return (bool) mt_rand(0,1);
    }
}
