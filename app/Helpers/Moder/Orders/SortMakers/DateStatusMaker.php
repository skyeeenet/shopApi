<?php

namespace App\Helpers\Moder\Orders\SortMakers;

use App\Helpers\Moder\Orders\SortMaker;
use App\Helpers\Moder\Orders\Sorts\DateStatus;

class DateStatusMaker extends SortMaker
{

    public function crateSort()
    {
        return new DateStatus();
    }
}