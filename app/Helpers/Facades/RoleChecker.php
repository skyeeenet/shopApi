<?php

namespace App\Helpers\Facades;

use App\User;
use Illuminate\Support\Facades\Facade;

class RoleChecker extends Facade {

    public static function checkRole(User $user) {

        if ($user->role_id > 1) return true;
        else return false;
    }
}