<?php

namespace App\Helpers\Moder\Orders\Sorts;

use App\Helpers\Date\DateNormalizer;
use App\Helpers\Moder\Orders\Sort;
use App\Order;
use Illuminate\Http\Request;

class DateStatusPhoneSort extends Sort
{

    public function getDataAfterSort(Request $request)
    {
        $begin = $request->begin;
        $end = $request->end;
        DateNormalizer::getNormalizedDate($begin, $end);

        $status = $request->status;
        $phone = $request->phone;

        return Order::whereBetween('created_at', [$begin, $end])
            ->where([
                'status_id' => $status,
                'phone' => $phone
            ])
            ->paginate($this::PAGINATE);
    }
}