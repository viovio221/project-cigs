<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        $profiles = [
            [
                'history' => 'Wayang Riders was founded on February 12, 1999, located in one of the areas in West Java, namely the city of Cimahi whose founder is Irfan Santika, Gugum Gumilar who now serves as General Chairperson of the Wayang Riders and class of 1999. Wayang Riders started around 2002-2010, in early February 1999 Wayang Riders was continued with Generation Yudi Ardhana. One of the activities they often do is travel, and often hold events as a hobby some members who like to hang out, started to want to raise the name of their hangout. It was with this activity that the name Wayang Rider became known in Cimahi City and began to thrive from year to year. If you compare it, it turns out that the Wayang Riders are like a "VIRUS" which spreads quickly, in almost several areas of Cimahi City and several areas there are children of the Wayang Riders. The Wayang Riders are famous for their motorbike children who almost every week hold gatherings together, either in their respective areas or get-togethers that are usually held at the place where the name Wayang Riders first appeared. The Wayang Riders started to get excited and agreed to wear the “Orange – White” colored flag which has its own philosophy. The Orange color reflects kinship that cannot be measured by anything, while the White color itself means coloring, in other words, the bonds of kinship are formed even tighter. due to the different characteristics of the members but having the same goal of becoming the Wayang Riders Big Family. Around 2003 there was friction between the elite Wayang Riders, this resulted in a split, from this split several names emerged and the Wayang Riders themselves split into 2 groups, some continued to use the "Orange-White" flag and some wore the "Orange" flag. . -White flag. “Red – White – Black”.',
                'image' => 'OYgzUVM53L1lDc2uDUF39v3HGmlbz65SpJtfxFAu.png',
                'community_bio' => 'Welcome to the profile page Wayang Riders! Together, we arre more than just a community; we are a family that shares the spirit of adventure, experiences, and journeys. With the motto "Ride Together, Thrive Together," we build strong bonds and achieve remarkable feats. Embrace the freedom and adventure with us on uncharted roads and unforgettable moments. Every ride is fueled by camaraderie and a collective spirit, for we believe that togetherness is the key to our success. Lets keep this fiery spirit alive, navigating lifes twists and turns with enthusiasm and unity. Wayang Riders invites you to experience the thrill of freedom behind every twist of the throttle, leaving your mark on both the asphalt and hearts, and celebrating every accomplishment together. Join Wayang Riders today and become part of an inspiring journey of friendship and growth. Lets ride side by side, evolve together, and savor every moment of this exhilarating journey! Thank you for choosing Wayang Riders. Come, lets ride and thrive together! Welcome to our community!',
                'community_structure' => 'Struktur komunitas=> pengurus daerah, struktur anggota',
                'video'=>'video.mp4',
                'slogan'=>'Ride Together, Thrive Together',
                'community_name' => 'Wayang Riders',
            ],
        ];

        foreach ($profiles as $profileData) {
            $imagePath = public_path('images/') . $profileData['image'];

            $imageContents = file_get_contents($imagePath);
            $imagePathInStorage = 'profile_images/' . $profileData['image'];
            Storage::disk('public')->put($imagePathInStorage, $imageContents);

            $profileData['image'] = $imagePathInStorage;
            $profileData['video'] = 'profile_videos/' . $profileData['video'];
            DB::table('profiles')->insert($profileData);
        }
    }
}
