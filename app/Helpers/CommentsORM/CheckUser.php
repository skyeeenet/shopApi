<?php

namespace App\Helpers\CommentsORM;


use App\Comment;
use App\Exceptions\UserNotAllowed;
use Illuminate\Support\Facades\Auth;

trait CheckUser {

    public static function checkUser(Comment $comment) {

        $user =  Auth::user();

        if ($user->role->id > 1) 
        if ($user->role->id == 1 || $user->id != $comment->user_id) {

            throw new UserNotAllowed;
        }
    }
}