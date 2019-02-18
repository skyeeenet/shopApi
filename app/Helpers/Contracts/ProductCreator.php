<?php

namespace App\Helpers\Contracts;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

interface ProductCreator {

    public static function createProduct(ProductRequest $request);
}