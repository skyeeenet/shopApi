<?php

namespace App\Helpers\Moder\Orders\Sorts;

use App\Helpers\Moder\Orders\Sort;
use App\Order;
use Illuminate\Http\Request;

class DateBegin extends Sort
{

    public function getDataAfterSort(Request $request)
    {
        $begin = $request->begin;

        return Order::where('created_at', 'like', $begin.'%')->paginate($this::PAGINATE);
    }
}