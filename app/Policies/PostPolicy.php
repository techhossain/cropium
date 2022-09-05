<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Blog;

class PostPolicy
{
    use HandlesAuthorization;

    public function modifyPost(User $user, Blog $post)
    {

        return $post->user_id == $user->id;
    }

    public function deletePost(User $user, Blog $post)
    {

        return $post->user_id == $user->id;
    }
}
