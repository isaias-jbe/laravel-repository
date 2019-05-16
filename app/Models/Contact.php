<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'client_id', 'code', 'is_bot', 'first_name', 'last_name', 'photo'
    ];
}
