<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 18.12.2018
 * Time: 22:26
 */

namespace App\Helpers\Moder\Orders\Sorts;


use App\Helpers\Date\DateNormalizer;
use App\Helpers\Moder\Orders\Sort;
use App\Order;
use Illuminate\Http\Request;

class DateStatus extends Sort
{

    public function getDataAfterSort(Request $request)
    {
        $begin = $request->begin;
        $end = $request->end;
        DateNormalizer::getNormalizedDate($begin, $end);

        $status = $request->status;

        return Order::whereBetween('created_at', [$begin, $end])
            ->where([
                'status_id' => $status
            ])
            ->paginate($this::PAGINATE);
    }
}