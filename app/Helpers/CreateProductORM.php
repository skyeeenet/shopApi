<?php

namespace App\Helpers;

use App\Category;
use App\Exceptions\CategoryNotFound;
use App\Helpers\Contracts\ProductCreator;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CreateProductORM extends ProductBasic implements ProductCreator {


    public static function createProduct(ProductRequest $request) {

        $category = new self;

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        $product->image = $request->image;
        $product->category_id = $category->checkCategoryIfExist($request->category);
        $product->save();
        return response([
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);
    }


}