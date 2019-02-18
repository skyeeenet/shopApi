<?php

use Faker\Generator as Faker;

$factory->define(App\order_product::class, function (Faker $faker) {
    return [
        'order_id' => function() {
            return \App\Order::all()->random();
        },
        'product_id' => function() {
            return \App\Product::all()->random();
        },
        'amount' => $faker->numberBetween(0,10)
    ];
});
