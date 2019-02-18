<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 18.12.2018
 * Time: 22:20
 */

namespace App\Helpers\Moder\Orders\SortMakers;


use App\Helpers\Moder\Orders\SortMaker;
use App\Helpers\Moder\Orders\Sorts\DateStatusPhoneSort;

class DateStatusPhoneMaker extends SortMaker
{

    public function crateSort()
    {
        return new DateStatusPhoneSort();
    }
}