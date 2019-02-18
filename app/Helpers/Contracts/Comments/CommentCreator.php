<?php

namespace App\Helpers\Contracts\Comments;

use App\Http\Requests\CommentRequest;
use App\Product;

interface CommentCreator {

    public static function createComment(CommentRequest $request, Product $product);
}