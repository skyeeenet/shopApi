<?php

namespace App\Helpers\Contracts\Order;


use App\Order;
use Illuminate\Contracts\Auth\Authenticatable;

interface OrderGiver
{
    public static function getOrder(Authenticatable $user, Order $order);
}