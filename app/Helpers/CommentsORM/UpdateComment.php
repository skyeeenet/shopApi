<?php

namespace App\Helpers\CommentsORM;


use App\Comment;
use App\Helpers\Contracts\Comments\CommentUpdater;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\Comments\CommentResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateComment implements CommentUpdater {

    public static function updateComment(CommentRequest $request, Comment $comment) {

        $user =  Auth::user();

        if ($user->role->id > 1 || $user->id == $comment->user_id) {

            $comment->update($request->all());

            return response([
                'data' => new CommentResource($comment)
            ], Response::HTTP_CREATED);
        }
        else {

            return response([
                'error' => 'UserNotAllowed'
            ], Response::HTTP_FORBIDDEN);
        }
    }
}