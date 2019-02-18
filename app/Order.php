<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','phone', 'info', 'first_name', 'last_name',
        'patronymic','address', 'created_at', 'updated_at'];

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function products() {

        return $this->hasMany(order_product::class);
    }
}
