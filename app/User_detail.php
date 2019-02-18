<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    protected $fillable = ['phone', 'first_name', 'last_name', 'patronymic'];
}
