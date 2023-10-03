<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
            [
                'title' => 'Wayang Riders Officially Launched: A New Motorcycle Community Inspiring The Spirit Of Brotherhood',
                'description' => 'Today marks the official launch of Wayang Riders, a vibrant motorcycle community dedicated to celebrating the rich heritage of Javanese puppetry. Founded by passionate riders and puppetry enthusiasts, this community aims to foster the spirit of brotherhood among motorcycle enthusiasts who share a deep love for Wayang Jawa.',
                'image' => '/storage/new_images/news1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Join Us for an Exciting Journey: Tour Wayang Riders 2023',
                'description' => 'Get ready for an exhilarating motorcycle adventure as we announce Tour Wayang Riders 2023! This year, we are taking you on a journey to explore the fascinating heritage of Javanese puppetry. Join us and be a part of this unforgettable cultural experience.',
                'image' => '/storage/new_images/news2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Upcoming Event: Wayang Riders Music Night',
                'description' => 'Prepare to be enchanted by the melodious tunes of Javanese puppetry-inspired music at the Wayang Riders Music Night. Join us for a night filled with artistic performances that celebrate the magic of Wayang Jawa through music, poetry, and more.',
                'image' => '/storage/new_images/news3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('news')->insert($news);
    }
}
