<?php

namespace App\Policies;

use App\Models\Episode;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EpisodePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Episode $episode): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Episode $episode): bool
    {
        return $user->id==$episode->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Episode $episode): bool
    {
        if($user->id==$episode->user_id) {
            return true;
        }
        foreach($user->roles as $role) {
            if($role->name=='admin') {
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Episode $episode): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Episode $episode): bool
    {
        //
    }
}
