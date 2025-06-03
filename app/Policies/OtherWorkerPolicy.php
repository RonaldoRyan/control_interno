<?php

namespace App\Policies;

use App\Models\OtherWorker;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OtherWorkerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('webAdmi') || $user->can('view.otherWorker');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('webAdmi') || $user->can('createOtherWorker');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, OtherWorker $otherWorker): bool
    {
        return $user->hasRole('webAdmi') || $user->can('update.otherWorker');
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, OtherWorker $otherWorker): bool
    {
        return $user->hasRole('webAdmi') || $user->can('delete.otherWorker');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, OtherWorker $otherWorker): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, OtherWorker $otherWorker): bool
    {
        return false;
    }
}
