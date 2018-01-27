<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Address::class, function (Faker $faker) {
    return [
        'pkey' => $faker->uuid,
        'country' => $faker->country,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'timezone' => $faker->timezone,
        'address' => $faker->streetAddress,
        'state' => $faker->city,
    ];
});
