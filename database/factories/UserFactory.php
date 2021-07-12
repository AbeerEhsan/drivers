<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->word,
        'phone' => $faker->e164PhoneNumber,
        'img' => 'user.png',
        'type' => $faker->randomElement(['student', 'driver']),
        'details' => $faker->text,
        'address' => $faker->word,
        'location' => $faker->word,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),

    ];
});
