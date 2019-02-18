<?php

namespace App\Helpers\Contracts\Order;


use App\Order;
use Illuminate\Contracts\Auth\Authenticatable;

interface OrderRemover {

    public static function removeOrderWithDependencies (Order $order, Authenticatable $user);
}