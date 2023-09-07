<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class EventDataController extends Controller
{

    public function registerEvent(Request $request)
    {
        // Validasi data yang diterima dari permintaan POST
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
}
