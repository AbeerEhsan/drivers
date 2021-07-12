<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\Models\User::create(
            [
                'name' => 'admin',
                'phone'=>'0599664455',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123123'),
                'type' => 'admin',
                'img' => 'user.png'
            ]
        );

        App\Models\User::create(
            [
                'name' => 'Abeer',
                'phone'=>'0599667845',
                'email' => 'abeer@test.com',
                'password' => bcrypt('123123'),
                'type' => 'student',
                'img' => 'user.png'

            ]
        );
        App\Models\User::create(
            [
                'name' => 'Afnan',
                'phone' => '05996232455',
                'email' => 'afnan@test.com',
                'password' => bcrypt('123123'),
                'type' => 'driver',
                'img' => 'user.png'

            ]
        );

        factory(App\Models\User::class, 50)->create();
    }
}
