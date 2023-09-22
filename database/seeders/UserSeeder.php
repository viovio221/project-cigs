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
            'name' => 'admin',
            'email' => 'wayangriders@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'phone_number'=>'089687792980',
            'gender'=>'male',
        ]);
    }


}
