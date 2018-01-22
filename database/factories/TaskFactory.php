<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Task::class, function (Faker $faker) {

    return [
        'archived' => $faker->numberBetween(0, 1),
        'inquiry_id' => $faker->uuid,
        'name' => $faker->words(4, true),
        'notes' => $faker->sentence(10),
        'account' => $faker->randomNumber(7, true) . '.' . $faker->randomNumber(4),
        'status' => $faker->numberBetween(0, 1, 3),
        'due' => $faker->dateTime()->format('Y-m-d H:i:s'),
        'user_id' => $faker->uuid,
        'list' => $faker->randomElement(['Pricing'])
    ];
});
