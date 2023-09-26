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
            'name' => 'Non Member',
            'email' => 'devaniamelia495@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'non-member',
            'phone_number' => '081234567890',
            'gender' => 'male',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'wayangriders@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'phone_number'=>'089687792980',
            'gender'=>'male',
        ]);
        User::create([
            'name' => 'Member',
            'email' => 'devaniamelia2018@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'member',
            'phone_number' => '089123456789',
            'gender' => 'female',
        ]);
    }
}
