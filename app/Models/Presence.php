<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $table = 'presence';
    protected $fillable = [
        'status',
        'images',
        'event_data_id',
        'user_id',
    ];
    public function scopeWithEvent($query)
    {
        return $query->leftJoin('event_data', 'presence.event_data_id', '=', 'event_data.id')
                     ->select('presence.*', 'event_data.name as name');
    }
    public function eventData()
    {
        return $this->belongsTo(EventData::class, 'event_data_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
