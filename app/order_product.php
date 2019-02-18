<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    protected $fillable = ['product_id', 'amount'];

    public function product() {

        return $this->hasOne(Product::class,'id','product_id');
    }
}
