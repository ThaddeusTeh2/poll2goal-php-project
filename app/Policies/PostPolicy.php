<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any posts.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the post.
     */
    public function view(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can create post.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the post.
     */
    public function update(User $user, Post $post): bool
    {
        // make sure only the post owner can update
        if ( $user->id === $post->user_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the post.
     */
    public function delete(User $user, Post $post): bool
    {
        // make sure only the post owner can delete
        return $user->id === $post->user_id || $user->role === "mod" || $user->role === "admin";
    }
}