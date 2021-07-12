<?php

use Illuminate\Database\Seeder;

class StudentAttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\StudentAttend::class, 150)->create();
    }
}
