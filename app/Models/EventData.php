<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventData extends Model
{
    use HasFactory;

    protected $table = 'event_data';

    protected $fillable = [
        'event_name',
        'event_date',
        'user_id',
        'status',
    ];

    // Metode untuk menyimpan data pendaftaran acara
    public static function createEventData($eventData)
    {
        return static::create($eventData);
    }
}
