<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Inquiry::class, function (Faker $faker) {
    return [
        'name' => $faker->words(4, true),
        'email' => $faker->email,
        'rental' => $faker->words(4, true),
        'arrive' => $faker->date('Y/m/d'),
        'depart' => $faker->date('Y/m/d'),
        'recevied' => $faker->date('Y/m/d'),
        'checkin' => $faker->time('H:i'),
        'checkout' => $faker->time('H:i'),
        'booking_id' => $faker->uuid,
        'inquiry_id' => $faker->uuid,
        'source' => $faker->word,
        'adults' => $faker->randomNumber(2),
        'children' => $faker->randomNumber(2),
        'cost' => $faker->randomNumber(2),

    ];
});
