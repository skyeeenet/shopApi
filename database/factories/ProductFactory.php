<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'stock' => $faker->numberBetween(0,1),
        'price' => $faker->randomDigit,
        'discount' => $faker->numberBetween(0,25),
        'image' => str_random(30),
        'category_id' => function() {
            return \App\Category::all()->random();
        }
    ];
});
