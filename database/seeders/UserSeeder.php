<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Fadilah Nurhasani',
            'email' => 'fadilahnurhasani41@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'organizer',
            'phone_number' => '08872415689',
            'gender' => 'male',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'wayangriders@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'phone_number'=>'083826272207',
            'gender'=>'male',
        ]);
        User::create([
            'name' => 'Devani Amelia Pratiwi',
            'email' => 'devaniamelia2018@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'member',
            'phone_number' => '083826272207',
            'gender' => 'female',
        ]);
        User::create([
            'name' => 'Azzam Zulfan Noya',
            'email' => 'azzamnoya123@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'non-member',
            'phone_number' => '085954730522',
            'gender' => 'female',
        ]);
        User::create([
            'name' => 'Keyza Khalish Murad',
            'email' => 'keyzakhalishmurad@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'non-member',
            'phone_number' => '082117541335',
            'gender' => 'female',
        ]);
    }
}
