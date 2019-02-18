<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 03.12.2018
 * Time: 23:37
 */

namespace App\Helpers\Contracts;


use App\Http\Requests\ProductRequest;
use App\Product;

interface ProductUpdater {

    public static function updateProduct(ProductRequest $request, Product $product);
}