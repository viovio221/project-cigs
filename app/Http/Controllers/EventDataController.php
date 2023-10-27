<?php
namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Event;
use App\Models\Profile;
use App\Models\Presence;
use App\Models\EventData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use GuzzleHttp\Client;


class EventDataController extends Controller
{
    public function index()
    {
        $eventdata = EventData::all();
        $presence = Presence::all();
        $users = User::all();
        $profile = Profile::all();
        $nonMemberCount = User::where('role', 'member')->count();
        $memberCount = User::where('role', 'non-member')->count();
        $adminCount = User::where('role', 'admin')->count();
        $eventCount = Event::count();
        $newsCount = News::count();

        if (auth()->check()) {
            $eventData = EventData::all();

            return view('dashboard.index', compact('eventData', 'memberCount', 'nonMemberCount', 'profile', 'adminCount', 'eventCount', 'newsCount', 'users', 'presence', 'eventdata'));
        } else {
            Alert::error('You dont have access to the dashboard page', 'Please log in first')->persistent('Close');
            return redirect('/login');
        }
    }

    public function registerEvent(Request $request)
    {
        $profile = Profile::first();
        $apiKey = $profile->api_key;
        $sender = $profile->sender;

        $request->validate([
            'user_id' => 'required',
            'eventId' => 'required',
        ]);

        $userId = $request->input('user_id');
        $eventId = $request->input('eventId');

        $existingRegistration = EventData::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->first();

        if ($existingRegistration) {
            return response()->json(['message' => 'You are already registered for this event.']);
        }

        $eventData = new EventData([
            'event_id' => $eventId,
            'user_id' => $userId,
            'status' => 'registered'
        ]);

        if ($eventData->save()) {
            $user = User::find($userId);
            $event = Event::find($eventId);

            if ($user && $event) {
                $message = "Congratulations, {$user->name}! You have successfully registered for the event {$event->name}, which will take place on {$event->date}. Thank you for your participation!";

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

                return response()->json(['message' => 'Registration successful']);
            } else {
                return response()->json(['message' => 'Failed to register for the event'], 500);
            }
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $userId = $request->input('user_id');
        $eventId = $request->input('event_id');

        $existingRegistration = EventData::where('user_id', $userId)
            ->where('event_name', $eventId)
            ->first();

        if ($existingRegistration) {
            return back()->with('warning', 'You have already registered for this event!');
        }

        $newRegistration = new EventData([
            'user_id' => $userId,
            'event_id' => $eventId,
        ]);

        $newRegistration->save();

        return back()->with('success', 'Registration successful.');
    }


    //     public function getEventDescription($eventId)
// {
//     $event = Event::find($eventId);

    //     return view('dashboard.qrcode.event_register', compact('event'));
// }

public function storeForEventRegister(Request $request)
{
    $profile = Profile::first();
    $apiKey = $profile->api_key;
    $sender = $profile->sender;
    $request->validate([
        'user_id' => 'required',
        'event_id' => 'required',
    ]);

    $userId = $request->input('user_id');
    $eventId = $request->input('event_id');

    $existingRegistration = EventData::where('user_id', $userId)
        ->where('event_id', $eventId)
        ->first();

    if ($existingRegistration) {
        return back()->with('warning', 'You have already registered for this event!');
    }

    $newRegistration = new EventData([
        'user_id' => $userId,
        'event_id' => $eventId,
    ]);

    if ($newRegistration->save()) {
        $user = User::find($userId);
        $event = Event::find($eventId);

        if ($user && $event) {
            $message = "Congratulations, {$user->name}! You have successfully registered for the event {$event->name}, which will take place on {$event->date}. Thank you for your participation!";

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
                return redirect()->route('dashboard.qrcode.event_register')->with('success', 'Registration Successful');
            } else {
                return redirect()->route('dashboard.qrcode.event_register')->with('error', 'Failed to send WhatsApp message');
            }
        }
    }

    return redirect()->route('dashboard.qrcode.event_register')->with('error', 'Failed to register for the event');
}


    public function edit($id)
    {
        $eventData = EventData::findOrFail($id);
        return view('event_data.edit', compact('eventData'));
    }
    public function storeForAdmin(Request $request)
    {
        $profile = Profile::first();
        $apiKey = $profile->api_key;
        $sender = $profile->sender;

        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
        ]);

        $userId = $request->input('user_id');
        $eventId = $request->input('event_id');

        $existingRegistration = EventData::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->first();

        if ($existingRegistration) {
            return back()->with('warning', 'You have already registered for this event!');
        }

        $user = User::find($userId);
        $event = Event::find($eventId);

        $recipientNumber =  $user->phone_number;
        $message = "Congratulations, {$user->name}! You have successfully registered for the event {$event->name}, which will take place on {$event->date}. Thank you for your participation!";

        $client = new Client();

        try {
            $response = $client->post($profile->endpoint, [
                'form_params' => [
                    'api_key' => $apiKey,
                    'sender' => $sender,
                    'number' => $recipientNumber,
                    'message' => $message,
                ],
            ]);

            $newRegistration = new EventData([
                'user_id' => $userId,
                'event_id' => $eventId,
            ]);

            $newRegistration->save();

            return back()->with('success', 'Registration successful.');
        } catch (\Exception $e) {
            Alert::error('No connection', 'Please try again')->persistent(true);
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        $eventData = EventData::find($id);

        if (!$eventData) {
            return redirect()->route('dashboard')->with('error', 'Event data not found.');
        }
        $eventData->delete();

        return redirect()->route('dashboard')->with('success', 'Event data deleted successfully.');
    }



}
