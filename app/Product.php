<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','category_id','stock','discount','image'];

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function comments() {

        return $this->hasMany(Comment::class);
    }
}
