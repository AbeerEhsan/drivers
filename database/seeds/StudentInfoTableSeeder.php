<?php

use Illuminate\Database\Seeder;

class StudentInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\StudentInfo::class, 10)->create();
    }
}
