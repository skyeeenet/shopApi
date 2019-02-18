<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['title', 'body', 'star', 'user_id'];

    public function product() {

        return $this->belongsTo(Product::class);
    }
}
