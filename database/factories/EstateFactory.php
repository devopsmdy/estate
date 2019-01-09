<?php

use Faker\Generator as Faker;

$factory->define(App\Estate::class, function (Faker $faker) {
    return [
        'address' => $faker->firstName,
        'road' => $faker->address,
        'area' => $faker->lastName,
        'price' => '1000000',
        'note' => $faker->company,
        'township_id' => '1',
        'type_id' => '1',
        'deal' => 'sale',
        'status' => '1'
    ];
});
