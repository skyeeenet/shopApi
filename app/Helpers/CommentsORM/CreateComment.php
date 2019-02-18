<?php

namespace App\Helpers\CommentsORM;
use App\Comment;
use App\Helpers\Contracts\Comments\CommentCreator;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\Comments\CommentResource;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CreateComment implements CommentCreator
{

    public static function createComment(CommentRequest $request, Product $product) {

        $request['user_id'] = Auth::id();

        $comment = new Comment($request->all());

        $product->comments()->save($comment);

        return response([
           'data' => new CommentResource($comment)
        ], Response::HTTP_CREATED);
    }
}