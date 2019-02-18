<?php
namespace App\Helpers\ProductsSort;

use App\Helpers\ProductsSort\SortMaker\CategoryMaker;
use App\Helpers\ProductsSort\SortMaker\PriceBeginEndMaker;
use Exception;
use Illuminate\Http\Request;

class getOrdersMaker
{
    public static function getMaker(Request $request) {

        if ($request->begin && $request->end) {

            return new PriceBeginEndMaker();
        }
        if ($request->category) {

            return new CategoryMaker();
        }
        throw new Exception('Problem with request');
    }
}