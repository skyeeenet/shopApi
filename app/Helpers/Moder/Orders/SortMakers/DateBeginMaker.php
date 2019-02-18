<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 18.12.2018
 * Time: 22:33
 */

namespace App\Helpers\Moder\Orders\SortMakers;


use App\Helpers\Moder\Orders\SortMaker;
use App\Helpers\Moder\Orders\Sorts\DateBegin;

class DateBeginMaker extends SortMaker
{

    public function crateSort()
    {
        return new DateBegin();
    }
}