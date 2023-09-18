<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Event;


class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'name' => 'Tour Wayang Riders: Exploring the Heritage of Javanese Puppetry',
                'date' => '2023-10-15',
                'location' => 'Pangandaran Beach',
                'description' => 'Join us on an exhilarating motorcycle journey with our Wayang Riders community to explore historical sites related to Javanese puppetry. Immerse yourself in an unforgettable cultural experience as we delve into the rich heritage of Wayang Jawa',
                'image' => '/storage/event_images/event2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wayang Riders Music Night: Soundtracking the Journey',
                'date' => '2023-11-20',
                'location' => 'Jalan Raya Lembang',
                'description' => 'Celebrate art and creativity as we invite members of the Wayang Riders community to showcase their talents through poetry, art, or short stories inspired by their love for Javanese puppetry. Its a night filled with inspiration and artistic expression',
                'image' => '/storage/event_images/event1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wayang Riders Social Outreach: Spreading Happiness on the Road',
                'date' => '2023-11-20',
                'location' => 'Jalan Raya Lembang',
                'description' => 'Be a part of positive change by joining our social outreach event. We will provide assistance to communities in need, using our motorcycles as a means of spreading goodwill and happiness along the way.',
                'image' => '/storage/event_images/event2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('events')->insert($events);
    }
}
