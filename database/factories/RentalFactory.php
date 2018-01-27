<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Rental::class, function (Faker $faker) {
    return [
        'name' => $faker->words(4, true),
        'pkey' => $faker->uuid,
        'bedrooms' => $faker->randomNumber(1),
        'description' => $faker->sentences(3, true),
        'type_id' => factory(\App\Type::class)->create()->id,
        'address_id' =>factory(\App\Address::class)->create()->id
    ];
});
