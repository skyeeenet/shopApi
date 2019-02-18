<?php

namespace App\Helpers\Moder\Orders;


use App\Helpers\Contracts\Moder\OrdersSort;
use App\Helpers\Moder\Orders\SortMakers\ChooseMaker;
use Illuminate\Http\Request;

class SortOrders implements OrdersSort
{

    public static function getSortOrders(Request $request)
    {
        $maker = ChooseMaker::getMakerByRequest($request);

        $sort = $maker->crateSort();

        return $sort->getDataAfterSort($request);
    }
}