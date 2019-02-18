<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return \App\User::all()->random();
        },
        'status_id' => function() {
            return \App\Status::all()->random();
        },
        'phone' => $faker->phoneNumber,
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'patronymic' => $faker->name,
        'address' => $faker->address,
        'info' => str_random(20)
    ];
});
