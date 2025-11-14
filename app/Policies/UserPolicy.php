<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

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
    public function edit(User $user, User $model)
    {
        if($user->email === "test@example1234.com") {
            return true;
        }

        return $user->id === $model->id ? Response::allow() : Response::deny();
    }
}
