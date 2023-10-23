<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappPasswordReset extends Model
{
    protected $table = 'whatsapp_password_resets';

    protected $fillable = [
        'phone_number', 'token'
    ];
}
