<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 18.12.2018
 * Time: 16:56
 */

namespace App\Helpers\Moder\Orders\SortMakers;


use App\Helpers\Moder\Orders\SortMaker;
use App\Helpers\Moder\Orders\Sorts\DateSort;

class DateSortMaker extends SortMaker
{

    public function crateSort()
    {
        return new DateSort();
    }
}