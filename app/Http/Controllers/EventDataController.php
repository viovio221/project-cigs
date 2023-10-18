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
use RealRashid\SweetAlert\Facades\Alert;

class EventDataController extends Controller
{
    public function index()
    {
        $eventdata= EventData::all();
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
        $request->validate([
            'user_id' => 'required',
            'eventName' => 'required',
            'eventDate' => 'required',
        ]);

        $userId = $request->input('user_id');
        $eventName = $request->input('eventName');

        $existingRegistration = EventData::where('user_id', $userId)
            ->where('event_name', $eventName)
            ->first();

        if ($existingRegistration) {
            return response()->json(['message' => 'You are already registered for this event.']);
        }

        $eventData = new EventData([
            'event_name' => $eventName,
            'event_date' => $request->input('eventDate'),
            'user_id' => $userId,
            'status' => 'registered'
        ]);

        if ($eventData->save()) {
            return response()->json(['message' => 'Registration successful']);
        } else {
            return response()->json(['message' => 'Failed to register for the event'], 500); // 500 is the server error status code
        }
    }

    public function storeForAdmin(Request $request)
    {
        $dateToday = now()->toDateString();
        $request->validate([
            'user_id' => 'required',
        ]);

        $userId = $request->input('user_id');
        $eventName = $request->input('event_name');
        $eventDate = $request->input('event_date');

        $existingRegistration = EventData::where('user_id', $userId)
            ->where('event_name', $eventName)
            ->first();

        if ($existingRegistration) {
            return redirect()->route('event')->with('warning', 'You have already registered for this event!');
        }

        $attendanceToday = EventData::where('user_id', $userId)
            ->whereDate('event_date', $dateToday)
            ->count();

        if ($attendanceToday > 0) {
            return redirect()->route('event')->with('warning', 'You have already attended this event today.');
        }

        $newRegistration = new EventData([
            'user_id' => $userId,
            'event_name' => $eventName,
            'event_date' => $eventDate,
        ]);

        $newRegistration->save();

        return redirect()->route('event')->with('success', 'Registration successful.');
    }


//     public function getEventDescription($eventId)
// {
//     $event = Event::find($eventId);

//     return view('dashboard.qrcode.event_register', compact('event'));
// }

public function storeForEventRegister(Request $request)
{
    $dateToday = now()->toDateString();

    $request->validate([
        'user_id' => 'required',
        'event_name' => 'required',
        'event_date' => 'required',
    ]);
    $userId = $request->input('user_id');
    $eventName = $request->input('event_name');
    $eventDate = $request->input('event_date');
    $existingRegistration = EventData::where('user_id', $userId)
        ->where('event_name', $eventName)
        ->first();
    if ($existingRegistration) {
        return redirect()->route('dashboard')->with('warning', 'You are already registered for this event!');
    }
    $attendanceToday = EventData::where('user_id', $userId)
        ->whereDate('event_date', $dateToday)
        ->count();

    if ($attendanceToday > 0) {
        return redirect()->route('dashboard')->with('warning', 'You have already attended an event today.');
    }

    $newRegistration = new EventData([
        'user_id' => $userId,
        'event_name' => $eventName,
        'event_date' => $eventDate,
    ]);

    $newRegistration->save();

    return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil.');
}

    public function edit($id)
    {
        $eventData = EventData::findOrFail($id);
        return view('event_data.edit', compact('eventData'));
    }

    public function destroy($id)
    {
        $eventData = EventData::find($id);

        if (!$eventData) {
            return redirect()->route('dashboard')->with('error', 'Event data not found.');
        }

        $eventData->presence()->delete();

        $eventData->delete();

        return redirect()->route('dashboard')->with('success', 'Event data deleted successfully.');
    }

}
