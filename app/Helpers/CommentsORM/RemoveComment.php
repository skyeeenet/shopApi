<?php

namespace App\Helpers\CommentsORM;

use App\Comment;
use App\Helpers\Contracts\Comments\CommentRemover;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RemoveComment implements CommentRemover {


    public static function deleteComment(Product $product, Comment $comment) {

        $user =  Auth::user();

        if ($user->role->id > 1 || $user->id == $comment->user_id) {

            $comment->delete();

            return response(null, Response::HTTP_NO_CONTENT);
        }
        else {

            return response([
                'error' => 'No permissions'
            ], Response::HTTP_FORBIDDEN);
        }
    }
}