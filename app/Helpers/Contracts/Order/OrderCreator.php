<?php

namespace App\Helpers\Contracts\Order;

use App\Http\Requests\AddOrderProductRequest;
use Illuminate\Contracts\Auth\Authenticatable;

interface OrderCreator {

    public static function createOrder(AddOrderProductRequest $request, Authenticatable $user);

}