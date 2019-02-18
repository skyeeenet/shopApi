<?php

namespace App\Helpers\Contracts\Moder;

use Illuminate\Http\Request;

interface OrdersSort
{
    public static function getSortOrders(Request $request);
}