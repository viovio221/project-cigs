<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'id',
        'history',
        'community_bio',
        'image',
        'video',
        'community_structure',
        'slogan',
        'community_name',
    ];
}
