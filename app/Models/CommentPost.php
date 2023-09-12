<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'username', // Tambahkan 'username' ke sini
        'event_id',
        'content',
        'rating',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
