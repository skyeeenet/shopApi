<?php
namespace App\Helpers\OrderORM;


use App\Helpers\Contracts\Order\OrdersTaker;
use App\Http\Resources\Order\OrderResource;
use App\Order;
use Illuminate\Contracts\Auth\Authenticatable;

class TakeOrders implements OrdersTaker
{

    public static function getOrdersByUser(Authenticatable $user)
    {
        $user_id = $user->id;

        $orders = Order::where('user_id', $user_id)->paginate(25);

        return $orders;
    }
}