<?php

namespace App\Helpers\UserORM;

use App\Helpers\Contracts\User\UserUpdater;
use App\Http\Resources\User\UserResource;
use App\User;
use Illuminate\Http\Request;

class UpdateUser implements UserUpdater
{

    public static function updateUser(Request $request, User $user) {

        $user_id = $user->id;

        if ($request->user) {

            $user->update($request->user);
        }

        if ($request->details) {

            $user->details->update($request->details);
        }

        return new UserResource($user);
    }
}