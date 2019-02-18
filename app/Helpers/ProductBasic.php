<?php

namespace App\Helpers;


use App\Exceptions\CategoryNotFound;
use App\Product;

class ProductBasic {

    protected function checkCategoryIfExist($category_id) {

        $category = \App\Category::find($category_id);

        if ($category == null) {

            throw new CategoryNotFound;
        }

        return $category->id;

    }

    protected static function checkProductIfExist($product_id) {

        Product::findOrFail($product_id);
    }
}