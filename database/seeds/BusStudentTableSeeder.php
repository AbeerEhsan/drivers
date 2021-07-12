<?php

use Illuminate\Database\Seeder;

class BusStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\BusStudent::class, 20)->create();

    }
}
