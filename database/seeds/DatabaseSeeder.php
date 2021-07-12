<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BusesTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(StudentAttendanceTableSeeder::class);
        $this->call(StudentInfoTableSeeder::class);
        $this->call(BusStudentTableSeeder::class);

    }
}

