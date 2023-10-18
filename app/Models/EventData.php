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

    public static function createEventData($eventData)
    {
        return static::create($eventData);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function presence()
    {
        return $this->hasMany(Presence::class, 'event_data_id');
    }
}

