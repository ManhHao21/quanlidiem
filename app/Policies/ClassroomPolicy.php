<?php

namespace App\Policies;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClassroomPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'classroom');

            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Classroom $classroom): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'classroom', 'add');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'classroom', 'edit');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        $roleJson = $user->group->permisstion ?? "";

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = checkInput($roleArr, 'classroom', 'delete');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Classroom $classroom): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Classroom $classroom): bool
    {
        //
    }
}
