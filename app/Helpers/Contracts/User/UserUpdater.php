<?php

namespace App\Helpers\Contracts\User;

use App\User;
use Illuminate\Http\Request;

interface UserUpdater
{
    public static function updateUser(Request $request, User $user);
}