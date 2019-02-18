<?php

namespace App\Helpers\ProductsSort\SortMaker;

use App\Helpers\Moder\Orders\SortMaker;
use App\Helpers\ProductsSort\Sorts\PriceBeginEndSort;

class PriceBeginEndMaker extends SortMaker
{

    public function crateSort() {

        return new PriceBeginEndSort();
    }
}