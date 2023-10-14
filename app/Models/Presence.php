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
    ];
    public function eventData()
    {
        return $this->belongsTo(EventData::class, 'event_data_id', 'id');
    }
}
