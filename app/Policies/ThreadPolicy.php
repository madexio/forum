<?php

namespace App\Policies;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function action(User $user): bool
    {
        //
    }

    public function update(User $user, Thread $thread)
    {
        return $thread->user_id == $user->id;
    }
}