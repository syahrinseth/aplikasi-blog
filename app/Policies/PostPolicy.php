<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        // Allow everyone to view posts list
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Post $post): bool
    {
        // Allow everyone to view individual posts
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Only authenticated users with admin or author role can create posts
        return $user->hasAnyRole(['admin', 'author']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        // Admin can update any post
        if ($user->hasRole('admin')) {
            return true;
        }

        // Authors can only update their own posts
        return $user->hasRole('author') && $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        // Admin can delete any post
        if ($user->hasRole('admin')) {
            return true;
        }

        // Authors can only delete their own posts
        return $user->hasRole('author') && $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        // Only admins can restore posts
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        // Only admins can permanently delete posts
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can manage posts (admin dashboard).
     */
    public function manage(User $user): bool
    {
        // Only admins can access post management features
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can publish/unpublish posts.
     */
    public function publish(User $user, Post $post): bool
    {
        // Admin can publish/unpublish any post
        if ($user->hasRole('admin')) {
            return true;
        }

        // Authors can publish/unpublish their own posts
        return $user->hasRole('author') && $post->user_id === $user->id;
    }
}
