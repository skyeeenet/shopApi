<?php

namespace App\Helpers\Contracts\Order;

use Illuminate\Contracts\Auth\Authenticatable;

interface OrdersTaker
{
    public static function getOrdersByUser(Authenticatable $user);
}