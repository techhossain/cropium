<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function deleteUser(User $user)
    {
        return $user->is_admin ? Response::allow() : Response::deny('Only Administrator can delete an user');
    }

    // public function deleteSelf(User $user)
    // {
    //     return $user->is_admin ? Response::allow() : Response::deny('you can not delete yourself');
    // }
}
