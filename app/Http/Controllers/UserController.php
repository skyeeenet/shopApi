<?php

namespace App\Http\Controllers;

use App\Exceptions\UserNotAllowed;
use App\Helpers\Contracts\User\UserUpdater;
use App\Http\Resources\User\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct() {

        $this->middleware('jwt');
    }

    public function index() {

        $user_id = Auth::id();

        return new UserResource(User::with('details')->where('id', $user_id)->first());
    }

    public function update(Request $request, User $user, UserUpdater $updater) {

        $user_id = Auth::id();

        if ($user->id != $user_id) throw new UserNotAllowed;

        $result =  $updater::updateUser($request, $user);

        return response([
            'data' => $result
        ], Response::HTTP_CREATED);
    }
}
