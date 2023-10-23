<?php
namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\WhatsappPasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class NotificationController extends Controller
{
    public function sendOTPviaWhatsApp($recipientNumber, $otpCode)
    {
        $apiKey = 'ZMNgdCuH1Vi0OCQ6Recg8ZB9UPy68B';
        $sender = '6282128078893';
        $number = $recipientNumber;

        $message = "Hello, Wayang Riders!\n\n";
        $message .= "Welcome to the Wayang Riders Motorcycle Community App! 🏍️\n\n";
        $message .= "We are thrilled that you've joined our community. ";
        $message .= "To get started, we need to ensure the security of your account. Here is your OTP code for verification:\n\n";
        $message .= "OTP Code: $otpCode\n\n";
        $message .= "Please use this OTP code to complete the registration process of your account. ";
        $message .= "Click the following link to continue: https://wayang.kakara.my.id/login \n";
        $message .= "If you did not register, please disregard this message.\n\n";
        $message .= "Thank you for being a part of Wayang Riders! ";
        $message .= "If you have any questions or need assistance, feel free to reach out to our support team.\n\n";
        $message .= "Happy riding and being a part of the amazing Wayang Riders community! 🛵💨";

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

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email_or_whatsapp' => 'required',
        ], [
            'email_or_whatsapp' => "Email or WhatsApp is required.",
        ]);
        $input = $request->input('email_or_whatsapp');

        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $status = Password::sendResetLink(['email' => $input]);

            if ($status === Password::RESET_LINK_SENT) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Password reset link has been sent. Please check your email.'
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Email not registered.'
                    });
                </script>";
            }
        } else {
            $user = User::query()
                ->where('phone_number', $input)
                ->first();

            if ($user) {
                $userName = $user->name;
                $userPhoneNumber = $user->phone_number;

                $newToken = Str::random(60);
                $checkExistPhone = WhatsappPasswordReset::query()
                    ->where('phone_number', $userPhoneNumber)
                    ->latest()
                    ->first();

                if ($checkExistPhone) {
                    $addToken = $checkExistPhone->update([
                        'token' => $newToken,
                    ]);
                    $token = $checkExistPhone->token;
                } else {
                    $addToken = WhatsappPasswordReset::create([
                        'phone_number' => $userPhoneNumber,
                        'token' => $newToken,
                    ]);

                    $token = $addToken->token;
                }

                $resetLink = route('password.reset', ['token' => $token, 'phone_number' => $user->phone_number]);

                $apiKey = 'ZMNgdCuH1Vi0OCQ6Recg8ZB9UPy68B';
                $sender = '6282128078893';
                $number = $userPhoneNumber;

                $message = "Hello, $user->name Wayang Riders!\n\n";
                $message .= "You have requested a password reset for your Wayang Riders account.\n\n";
                $message .= "Click the following link to reset your password: $resetLink\n\n";
                $message .= "If you did not request a password reset, please ignore this message.\n\n";
                $message .= "Thank you for being a part of Wayang Riders!\n";

                $client = new Client();

                $response = $client->post('https://wag.cigs.web.id/send-message', [
                    'form_params' => [
                        'api_key' => $apiKey,
                        'sender' => $sender,
                        'number' => $number,
                        'message' => $message,
                    ],
                ]);

                $responseBody = json_decode($response->getBody(), true);

                echo "<script>
                    Swal.fire({
                        icon: '" . ($responseBody['status'] ? 'success' : 'error') . "',
                        title: '" . ($responseBody['status'] ? 'Success' : 'Error') . "',
                        text: '" . $responseBody['msg'] . "',
                    });
                </script>";
            }
        }
        return view('auth.forgot-password');
    }

    public function processResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $isEmail = $request->input('email');
        $isWhatsapp = $request->input('phone_number');
        // dd($isEmail);

        // $isEmail = $request->has('email');

        if ($isEmail) {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (User $user, string $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();
                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                ? redirect()->route('login.index')->with('status', 'Password reset successful')
                : back()->withErrors(['email' => __($status)]);
        } else {
            $token = $request->token;
            $confirmToken = WhatsappPasswordReset::query()
                ->where('token', $token)
                ->latest()
                ->first();

            if ($confirmToken) {
                $user = User::query()
                    ->where('phone_number', $isWhatsapp)
                    ->latest()
                    ->first();

                $user->update([
                    'password' => Hash::make($request->password),
                ]);

                return redirect()->route('login.index')->with('status', 'Password reset successful');
            } else {
                return back()->withErrors("Invalid token");
            }
        }
    }
}
