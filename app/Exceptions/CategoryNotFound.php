<?php

namespace App\Exceptions;

use Exception;

class CategoryNotFound extends Exception
{
    public function render() {

        return response([

            'errors' => 'Category not found'
        ],500);
    }
}
