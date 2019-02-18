<?php

namespace App\Helpers\ProductsSort\SortMaker;

use App\Helpers\Moder\Orders\SortMaker;
use App\Helpers\ProductsSort\Sorts\CategorySort;

class CategoryMaker extends SortMaker
{

    public function crateSort() {

        return new CategorySort();
    }
}