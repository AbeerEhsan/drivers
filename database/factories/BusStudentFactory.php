<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BusStudent;
use Faker\Generator as Faker;

$factory->define(BusStudent::class, function (Faker $faker) {

    return [
        'student_id' => $faker->unique()->randomElement(App\Models\User::where('type', 'student')->pluck('id')),
        'bus_id' =>     $faker->randomElement(App\Models\Bus::pluck('id')),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),

    ];
});
