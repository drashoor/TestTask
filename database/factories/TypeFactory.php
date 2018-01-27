<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Type::class, function (Faker $faker) {
    return [
        'pkey' => $faker->uuid,
        'name' => $faker->words(3, true)
    ];
});
