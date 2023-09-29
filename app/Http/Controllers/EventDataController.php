<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Profile;
use App\Models\EventData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class EventDataController extends Controller
{
    public function index()
    {
        $profile = Profile::all();
        $nonMemberCount = User::where('role', 'member')->count();
        $memberCount = User::where('role', 'non-member')->count();
        $adminCount = User::where('role', 'admin')->count();
        $eventCount = Event::count();
        $newsCount = News::count();
        if (auth()->check()) {
            $eventData = EventData::all();
            return view('dashboard.index', compact('eventData', 'memberCount', 'nonMemberCount', 'profile', 'adminCount', 'eventCount', 'newsCount'));
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

        // Check if the user is already registered for this event
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
    $eventData->delete();

    return redirect()->route('dashboard')->with('success', 'Event data deleted successfully.');
}

}
