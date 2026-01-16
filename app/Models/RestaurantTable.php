<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantTable extends Model
{
    protected $fillable = [
        'restaurant_id',
        'table_number',
        'qr_code',
        'status',
        'current_customer_name',
        'created_by',
    ];
}
