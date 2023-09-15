<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create([
            'phone_number' => '08123456789', // Ganti dengan nomor telepon yang sesuai
            'role' => 'member', // Menambahkan kolom "role" dengan nilai "member"
        ]);

        \App\Models\User::factory(10)->create([
            'phone_number' => '34567899', // Ganti dengan nomor telepon yang sesuai
            'role' => 'non-member', // Menambahkan kolom "role" dengan nilai "member"
        ]);
    }


}
