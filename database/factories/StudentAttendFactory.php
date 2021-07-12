<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StudentAttend;
use Faker\Generator as Faker;

$factory->define(StudentAttend::class, function (Faker $faker) {

    return [
        'student_id' => $faker->randomElement(App\Models\User::where('type', 'student')->pluck('id')),
        'attendance' => $faker->boolean,

        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
