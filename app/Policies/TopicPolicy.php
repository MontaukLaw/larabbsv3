<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy extends Policy
{
    public function update(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
        //return $topic->user_id == $user->id || $user->id == 1;
        //return true;
    }

    public function destroy(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
        //return $topic->user_id == $user->id || $user->id == 1 || $user->id == 2;
        //return true;
    }
}
