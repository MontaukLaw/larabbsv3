<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //修改User资料的人, 必须是自己, 或者是站长
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id || $currentUser->id == 1;
    }
}
