<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipe',
        'image',
    ];
    protected $table = 'user_documents';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
