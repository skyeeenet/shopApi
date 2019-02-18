<?php

namespace App\Helpers\ProductsSort\Sorts;

use App\Exceptions\CategoryNotFound;
use App\Helpers\Moder\Orders\Sort;
use App\Http\Resources\Product\ProductCollection;
use App\Product;
use Illuminate\Http\Request;

class CategorySort extends Sort
{

    public function getDataAfterSort(Request $request) {

        $category_id = $this->checkCategoryIfExist($request->category);

        $products = Product::where('category_id', $category_id)->paginate($this::PAGINATE);

        return ProductCollection::collection($products);
    }

    protected function checkCategoryIfExist($category_id) {

        $category = \App\Category::find($category_id);

        if ($category == null) {

            throw new CategoryNotFound;
        }

        return $category->id;

    }
}