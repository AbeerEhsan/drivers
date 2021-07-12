<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bus;
use Faker\Generator as Faker;

$factory->define(Bus::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'status' => $faker->randomElement(['free', 'busy']),
        'user_id' => $faker->randomElement(App\Models\User::where('type','driver')->pluck('id')),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),

    ];
});
