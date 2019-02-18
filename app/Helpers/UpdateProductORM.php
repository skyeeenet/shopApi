<?php

namespace App\Helpers;

use App\Helpers\Contracts\ProductUpdater;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Product;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductORM extends ProductBasic implements ProductUpdater
{

    public static function updateProduct(ProductRequest $request, Product $product) {

        $category = new self;

        $category->checkCategoryIfExist($request->category);

        $request['category_id'] = $request['category'];

        unset($request['category']);

        $product->update($request->all());

        return response([
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);

    }
}