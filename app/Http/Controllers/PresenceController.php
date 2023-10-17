<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Profile;
use App\Models\Presence;
use App\Models\EventData;
use Illuminate\Http\Request;
use App\Models\PresenceImage;
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
        $eventDataId = $request->input('event_data_id');
        // dd($eventDataId);

        $eventData = EventData::find($eventDataId);

        if ($eventData) {
            $eventData->update(['status' => 'checkin']);

            Presence::create([
                'status' => 'checkin',
                'event_data_id' => $eventData->id,
            ]);

            Alert::success('Thank you for check-in', 'Success');
        } else {
            Alert::warning('Event not found', 'Warning');
        }

        return redirect()->route('dashboard.qrcode.webcam');
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

    Alert::success('Image saved', 'Success')->persistent(true);

    return redirect()->route('dashboard.qrcode.presence');
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
