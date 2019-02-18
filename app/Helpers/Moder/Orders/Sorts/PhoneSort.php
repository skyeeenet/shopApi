<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 18.12.2018
 * Time: 22:36
 */

namespace App\Helpers\Moder\Orders\Sorts;


use App\Helpers\Moder\Orders\Sort;
use App\Order;
use Illuminate\Http\Request;

class PhoneSort extends Sort
{

    public function getDataAfterSort(Request $request)
    {
        $phone = $request->phone;

        return Order::where('phone', $phone)->paginate($this::PAGINATE);
    }
}