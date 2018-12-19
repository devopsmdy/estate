<?php

use Faker\Generator as Faker;

$factory->define(App\Township::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city,
    ];
});
