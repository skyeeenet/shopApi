<?php

namespace App\Helpers\Contracts\Comments;


use App\Comment;
use App\Http\Requests\CommentRequest;

interface CommentUpdater {

    public static function updateComment(CommentRequest $request, Comment $comment);
}