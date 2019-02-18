<?php

namespace App\Helpers\Moder\Orders\Sorts;

use App\Helpers\Date\DateNormalizer;
use App\Helpers\Moder\Orders\Sort;
use App\Order;
use Illuminate\Http\Request;

class DateSort extends Sort
{
    const PAGINATE = 20;

    public function getDataAfterSort(Request $request)
    {
        $begin = $request->begin;
        $end = $request->end;
        DateNormalizer::getNormalizedDate($begin, $end);

        return Order::whereBetween('created_at', [$begin, $end])->paginate($this::PAGINATE);
    }
}