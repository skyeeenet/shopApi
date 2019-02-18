<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 18.12.2018
 * Time: 17:00
 */

namespace App\Helpers\Moder\Orders\Sorts;


use App\Helpers\Moder\Orders\Sort;
use App\Order;
use Illuminate\Http\Request;

class StatusSort extends Sort
{


    public function getDataAfterSort(Request $request)
    {
        $status = $request->status;

        return Order::where('status_id', $status)->paginate($this::PAGINATE);
    }
}