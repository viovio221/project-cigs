<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

class EventsSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'name' => 'CRUISER CONVOY: MELINTASI KOTA DALAM GAYANYA SENDIRI',
                'date' => '2023-06-09',
                'location' => 'Jalan Raya Lembang',
                'description' => 'CRUISER CONVOY: MELINTASI KOTA DALAM GAYANYA SENDIRI adalah acara istimewa yang ditujukan bagi para penggemar motor cruiser yang ingin merayakan gaya hidup berkendara mereka dengan penuh kebanggaan. Acara ini menyediakan platform untuk komunitas motor cruiser berkumpul, berbagi pengalaman, dan menjalin persahabatan dalam atmosfer yang hangat dan mendukung. Kami mengutamakan keselamatan dan kepatuhan terhadap aturan lalu lintas, sehingga Anda dapat menikmati perjalanan tanpa khawatir. Selama konvoi motor ini, Anda akan memiliki kesempatan untuk mengekspresikan gaya unik Anda, mengagumi pemandangan kota yang menakjubkan, dan merasakan koneksi khusus yang hanya dimiliki oleh para penggemar motor cruiser. Meskipun kita merayakan gaya hidup berkendara cruiser dengan semangat tinggi, kami juga sangat menghargai keselamatan dan rasa tanggung jawab. Oleh karena itu, selalu ingat untuk mematuhi aturan lalu lintas dan menghormati semua pengguna jalan lainnya. Acara ini adalah kesempatan luar biasa untuk bersenang-senang dan merayakan gairah Anda terhadap dunia motor cruiser. Kami mengundang semua pecinta motor cruiser untuk bergabung dengan kami dalam perjalanan luar biasa ini dan menciptakan kenangan yang tak terlupakan. Bergabunglah dalam konvoi, nikmati perjalanan, dan jadilah bagian dari komunitas yang penuh semangat ini.',
                'image' => 'event4.png',
            ],
        ];

        foreach ($events as $eventData) {
            $imagePath = public_path('images/') . $eventData['image'];
            $imageContents = file_get_contents($imagePath);
            $imagePathInStorage = 'event_images/' . $eventData['image'];
            Storage::disk('public')->put($imagePathInStorage, $imageContents);

            $eventData['image'] = $imagePathInStorage;
            DB::table('events')->insert($eventData);
        }
    }
}
