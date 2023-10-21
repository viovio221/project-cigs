<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


class NotificationController extends Controller
{
    public function sendOTPviaWhatsApp($recipientNumber, $otpCode)
{
    $apiKey = 'ZMNgdCuH1Vi0OCQ6Recg8ZB9UPy68B';
    $sender = '6282128078893';
    $number = $recipientNumber;

    $message = "Halo, Wayang Riders!\n\n";
    $message .= "Selamat datang di Aplikasi Komunitas Motor Wayang Riders! 🏍️\n\n";
    $message .= "Kami sangat senang Anda bergabung dengan komunitas kami. ";
    $message .= "Untuk memulai, kami perlu memastikan akun Anda aman. Berikut adalah kode OTP Anda untuk verifikasi:\n\n";
    $message .= "Kode OTP: $otpCode\n\n";
    $message .= "Harap gunakan kode OTP ini untuk menyelesaikan proses pendaftaran akun Anda. ";
    $message .= "Klik link berikut untuk melanjutkan: https://wayang.kakara.my.id/login \n";
    $message .= "Jika Anda tidak melakukan pendaftaran, silakan abaikan pesan ini.\n\n";
    $message .= "Terima kasih telah menjadi bagian dari Wayang Riders! ";
    $message .= "Jika Anda memiliki pertanyaan atau memerlukan bantuan, jangan ragu untuk menghubungi tim dukungan kami.\n\n";
    $message .= "Selamat berkendara dan bergabung dengan komunitas Wayang Riders yang hebat! 🛵💨";

    $client = new Client();

    $response = $client->post('https://wag.cigs.web.id/send-message', [
        'form_params' => [
            'api_key' => $apiKey,
            'sender' => $sender,
            'number' => $number,
            'message' => $message,
        ],
    ]);

    return json_decode($response->getBody(), true);
}

}

