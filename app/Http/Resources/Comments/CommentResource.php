<?php

namespace App\Http\Resources\Comments;

use Illuminate\Http\Resources\Json\Resource;

class CommentResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'user' => $this->user_id,
            'body' => $this->body,
            'star' => $this->star,
            'title' => $this->title
        ];
    }
}
