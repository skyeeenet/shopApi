<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 05.12.2018
 * Time: 17:16
 */

namespace App\Helpers\Contracts\Comments;


use App\Comment;
use App\Product;

interface CommentRemover {

    public static function deleteComment(Product $product, Comment $comment);
}