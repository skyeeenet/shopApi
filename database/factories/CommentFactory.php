<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body' => $faker->paragraph,
        'star' => $faker->numberBetween(0,5),
        'product_id' => function() {
            return \App\Product::all()->random();
        },
        'user_id' => function() {
            return \App\User::all()->random();
        }
    ];
});
