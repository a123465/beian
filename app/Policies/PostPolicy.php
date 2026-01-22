<?php

namespace App\\Policies;

use App\\Models\\Post;
use App\\Models\\User;
use Illuminate\\Auth\\Access\\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     */
    public function view(?User $user, Post $post)
    {
        if ($post->status === 'published' && $post->is_public) {
            return true;
        }
        if ($user && $user->id === $post->user_id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create posts.
     */
    public function create(User $user)
    {
        // Any authenticated user may create; further checks (real-name, verified) can be added
        return (bool) $user;
    }

    /**
     * Determine whether the user can update the post.
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
