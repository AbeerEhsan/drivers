<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StudentInfo;
use Faker\Generator as Faker;

$factory->define(StudentInfo::class, function (Faker $faker) {

    return [
        'student_id' => $faker->randomElement(App\Models\User::where('type', 'student')->pluck('id')),
        'rate' => $faker->numberBetween($min = 60, $max = 100).'%',
        'level' => $faker->numberBetween($min = 1, $max = 12),
        -'deleted_at' => $faker->date('Y-m-d H:i:s'),

        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
