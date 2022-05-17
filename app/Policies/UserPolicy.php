<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function removeFromScan(User $user, User $scan_member)
    {
        return in_array($user->role, [Role::IS_SCAN_LEADER, Role::IS_ADMIN]) && $user->id == $scan_member->scanlator->id_leader 
                                                                            && $scan_member->role == Role::IS_SCAN_HELPER
                                                                            && $user->id != $scan_member->id;
    }

    public function editScanRole(User $user, User $scan_member)
    {
        return in_array($user->role, [Role::IS_SCAN_LEADER, Role::IS_ADMIN]) && $user->id == $scan_member->scanlator->id_leader;
    }

    public function changeLeader(User $user, User $scan_member)
    {
        return in_array($user->role, [Role::IS_SCAN_LEADER, Role::IS_ADMIN]) && $user->id == $scan_member->scanlator->id_leader
                                                                            && $user->id != $scan_member->id;
    }
}