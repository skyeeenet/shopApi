<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 04.12.2018
 * Time: 11:08
 */

namespace App\Helpers\Contracts;


use App\Product;

interface ProductRemover {

    public static function removeProductWithDependencies(Product $product);
}