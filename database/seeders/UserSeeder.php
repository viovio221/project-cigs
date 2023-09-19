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
        User::factory(10)->create([
            'phone_number' => '08123456789', // Ganti dengan nomor telepon yang sesuai
            'role' => 'member', // Menambahkan kolom "role" dengan nilai "member"
        ]);

        User::factory(10)->create([
            'phone_number' => '34567899', // Ganti dengan nomor telepon yang sesuai
            'role' => 'non-member', // Menambahkan kolom "role" dengan nilai "member"
        ]);
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
