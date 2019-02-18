<?php

namespace App\Helpers\Moder\Orders;

use Illuminate\Http\Request;

abstract class Sort
{
    const PAGINATE = 20;
   public abstract function getDataAfterSort(Request $request);
}