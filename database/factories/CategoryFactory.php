<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {

    for ($i = 0; $i < 5; $i++) {

        $category = new \App\Category;
        $category->name = 'category'.$i;
        $category->save();
    }

    return [
        'name' => 'end_category'
    ];
});
