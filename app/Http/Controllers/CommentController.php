<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Helpers\Contracts\Comments\CommentCreator;
use App\Helpers\Contracts\Comments\CommentRemover;
use App\Helpers\Contracts\Comments\CommentUpdater;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\Comments\CommentResource;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{

    public function __construct() {

        $this->middleware('jwt')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return CommentResource::collection($product->comments);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Product $product, CommentCreator $creator) {

        return $creator::createComment($request, $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product ,CommentRequest $request, Comment $comment, CommentUpdater $updater)
    {
        return $updater::updateComment($request, $comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Comment $comment, CommentRemover $remover) {

        return $remover::deleteComment($product, $comment);
    }

    protected function checkUser(User $user) {


    }
}
