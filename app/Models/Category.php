<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToRestaurant;

class Category extends Model
{
    use BelongsToRestaurant;
     protected $fillable = [
        'restaurant_id',
        'name',
        'is_active',
        'created_by',
    ];
}
