<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Profile;
use App\Models\Presence;
use App\Models\EventData;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

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
        $eventDataId = $request->input('event_data_id');
        $existingPresence = Presence::where('event_data_id', $eventDataId)->first();

        if ($existingPresence) {
            Alert::warning('You have already checked in for this event', 'Warning');
        } else {
            $newPresence = new Presence([
                'status' => 'checkin',
                'event_data_id' => $eventDataId,
            ]);

            $newPresence->save();

            Alert::success('Thank you for check-in', 'Success');
        }

        return redirect()->route('event');
    }
    public function scan($eventId)
{
    $profile = Profile::all();
    $event = Event::find($eventId);

    if (!$event) {
    }

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


}