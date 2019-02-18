<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 04.12.2018
 * Time: 11:13
 */

namespace App\Helpers;

use App\Helpers\Contracts\ProductRemover;
use App\Product;
use Symfony\Component\HttpFoundation\Response;

class DeleteProductWithDependencies implements ProductRemover
{

    public static function removeProductWithDependencies(Product $product) {

        $product->comments()->delete();
        $product->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}