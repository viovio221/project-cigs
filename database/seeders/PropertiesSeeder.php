<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesSeeder extends Seeder
{
    public function run()
    {
        // Seed data for the "properties" table
        DB::table('properties')->insert([
            [
                'headline_ev' => 'Event Headline 1',
                'text_ev' => 'Event Text 1',
                'headline_mg' => 'Magazine Headline 1',
                'text_mg' => 'Magazine Text 1',
                'phone_number' => '+629687792980',
                'instagram' => 'wayangriders_id',
                'facebook' => 'wayangriders_id',
                'twitter' => 'wayangriders_id',
                'email' => 'wayangriders.com',
            ],
        ]);
    }
}
