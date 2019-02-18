<?php

namespace App\Helpers\OrderORM;


use App\Helpers\Contracts\Order\OrderGiver;
use App\Order;
use Illuminate\Contracts\Auth\Authenticatable;

class GiveOrder implements OrderGiver
{

    public static function getOrder(Authenticatable $user, Order $order) {

        $user_id = $user->id;

        $orderWithInfo = $order::with('products.product')->where([

            'id' => $order->id,
            'user_id' => $user_id
        ])->first();

        return $orderWithInfo;
    }
}