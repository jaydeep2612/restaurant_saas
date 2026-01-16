<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
     protected $fillable = [
        'name',
        'email',
        'logo',
        'user_limit',
        'is_active',
        'created_by',
    ];
}
