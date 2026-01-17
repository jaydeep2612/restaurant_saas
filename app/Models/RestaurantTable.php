<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToRestaurant;

class RestaurantTable extends Model
{
    use BelongsToRestaurant;
    protected $fillable = [
        'restaurant_id',
        'table_number',
        'qr_code',
        'status',
        'current_customer_name',
        'created_by',
    ];
}
