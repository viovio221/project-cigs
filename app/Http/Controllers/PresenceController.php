<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use GuzzleHttp\Client;
use App\Models\Profile;
use App\Models\Presence;
use App\Models\EventData;
use Illuminate\Http\Request;
use App\Models\PresenceImage;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class PresenceController extends Controller
{
    public function index()
    {
        $profile = Profile::all();
        $event = Event::all();
        return view('dashboard.qrcode.presence', compact('event', 'profile'));
    }

  public function store(Request $request)
{
    $profile = Profile::first();
    $apiKey = $profile->api_key;
    $sender = $profile->sender;

    $eventDataId = $request->input('id');
    $eventId = $request->input('event_data_id');

    $eventData = EventData::where('id', $eventDataId)
        ->where('event_id', $eventId)
        ->first();

    if ($eventData) {
        if ($eventData->status === 'checkin') {
            Alert::warning('You have already checked in for this event.');
            return back();
        } else {
            $eventData->update(['status' => 'checkin']);
            Presence::create([
                'status' => 'checkin',
                'event_data_id' => $eventData->id,
            ]);

            $user = User::find($eventData->user_id);

            if ($user) {
                $event = Event::find($eventId);

                if ($event) {
                    $message = "Congratulations, {$user->name}! You've successfully checked in for the thrilling '{$event->name}' event, scheduled for {$event->date}. Your participation is greatly appreciated, and we're delighted to have you with us. Enjoy the event, engage with fellow attendees, and gain insights from our exceptional speakers. Have a great journey!";

                    $recipientNumber = $user->phone_number;

                    $client = new Client();

                    $response = $client->post($profile->endpoint, [
                        'form_params' => [
                            'api_key' => $apiKey,
                            'sender' => $sender,
                            'number' => $recipientNumber,
                            'message' => $message,
                        ],
                    ]);

                    if ($response->getStatusCode() == 200) {
                        Alert::success('Thank you for check-in', 'Success');
                    } else {
                        Alert::error('Failed to send WhatsApp notification', 'Error');
                    }

                    return redirect()->route('dashboard.qrcode.webcam');
                }
            }
        }
    } else {
        Alert::warning('Event data not found', 'Warning');
        return redirect()->back()->with('failed', 'Event data not found');
    }
}


    public function scan($eventId)
    {
        $profile = Profile::all();
        $event = Event::findOrFail($eventId);

        return view('dashboard.qrcode.presence', compact('event', 'profile'));
    }
    public function uploadImage(Request $request)
    {
        $imageData = $request->input('image');

        $presence = new Presence();
        $presence->images = $imageData;
        $presence->save();

        return response()->json(['success' => true]);
    }
    public function simpanGambar(Request $request)
    {
        $imageData = $request->input('image');

        $presenceImage = new PresenceImage();
        $presenceImage->image_path = $imageData;
        $presenceImage->save();

        Alert::success('Thank you for attending our event, may you have a pleasant journey!', 'Success')->persistent(true);

        return redirect()->route('dashboard');
    }
    public function destroy($id)
    {
        try {
            $presence = Presence::find($id);

            if (!$presence) {
                return redirect()->back()->with('failed', 'Presence data not found');
            }

            $presence->delete();

            return redirect()->back()->with('success', 'Presence data deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'An error occurred while deleting presence data');
        }
    }
}
