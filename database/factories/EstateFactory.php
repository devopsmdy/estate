<?php

use Faker\Generator as Faker;

$factory->define(App\Estate::class, function (Faker $faker) {
    return [
        'address' => $faker->streetAddress,
        'road' => $faker->streetName,
        'area' => $faker->numberBetween($min = 20, $max = 200),
        'price' => $faker->numberBetween($min = 100000, $max = 1000000),
        'note' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'township_id' => $faker->numberBetween($min= 1, $max=10),
        'type_id' => $faker->numberBetween($min= 1, $max=10),
        'deal' => 'sale',
        'status' => $faker->boolean($chanceOfGettingTrue = 50)
    ];
});
