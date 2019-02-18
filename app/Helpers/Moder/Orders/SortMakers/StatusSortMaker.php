<?php

namespace App\Helpers\Moder\Orders\SortMakers;

use App\Helpers\Moder\Orders\SortMaker;
use App\Helpers\Moder\Orders\Sorts\StatusSort;

class StatusSortMaker extends SortMaker
{

    public function crateSort()
    {
        return new StatusSort();
    }
}