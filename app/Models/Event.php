<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comment_posts()
    {
        return $this->hasMany(CommentPost::class);
    }

    public function event_users()
    {
        return $this->hasMany(Eventuser ::class);
    }
    public function eventData()
{
    return $this->hasMany(EventData::class, 'event_id');
}


}
