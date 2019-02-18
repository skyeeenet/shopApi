<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 18.12.2018
 * Time: 22:37
 */

namespace App\Helpers\Moder\Orders\SortMakers;


use App\Helpers\Moder\Orders\SortMaker;
use App\Helpers\Moder\Orders\Sorts\PhoneSort;

class PhoneSortMaker extends SortMaker
{

    public function crateSort()
    {
        return new PhoneSort();
    }
}