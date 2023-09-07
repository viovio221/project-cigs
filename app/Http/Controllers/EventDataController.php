<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EventData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class EventDataController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $eventData = EventData::all();
            return view('dashboard.index', compact('eventData'));
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

        $eventData = new EventData([
            'event_name' => $request->input('eventName'),
            'event_date' => $request->input('eventDate'),
            'user_id' => $request->input('user_id'),
            'status' => 'registered'
        ]);

        if ($eventData->save()) {
            return response()->json(['message' => 'Pendaftaran berhasil']);
        } else {
            return response()->json(['message' => 'Gagal mendaftar acara'], 500); // 500 adalah kode status kesalahan server
        }
    }
   // app/Http/Controllers/EventDataController.php

public function edit($id)
{
    $eventData = EventData::findOrFail($id);
    return view('event_data.edit', compact('eventData'));
}


public function destroy($id)
{
    $eventData = EventData::findOrFail($id);
    $eventData->delete();

    return redirect()->route('dashboard.index')
        ->with('success', 'Event Data berhasil dihapus.');
}
}