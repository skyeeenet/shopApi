<?php

use Faker\Generator as Faker;

$factory->define(App\User_detail::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return \App\User::all()->random();
        },
        'phone' => $faker->phoneNumber,
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'patronymic' => $faker->name
    ];
});
