<?php

namespace App\Helpers\ProductsSort\Sorts;

use App\Helpers\Moder\Orders\Sort;
use App\Http\Resources\Product\ProductCollection;
use App\Product;
use Illuminate\Http\Request;

class PriceBeginEndSort extends Sort
{

    public function getDataAfterSort(Request $request) {

        $begin = $request->begin;
        $end = $request->end;

        return ProductCollection::collection(Product::whereBetween('price', [$begin, $end])->paginate($this::PAGINATE));
    }
}