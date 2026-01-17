<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToRestaurant;

class MenuItem extends Model
{
    use BelongsToRestaurant;
   protected $fillable = [
        'restaurant_id',
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'is_available',
        'created_by',
    ];
}
