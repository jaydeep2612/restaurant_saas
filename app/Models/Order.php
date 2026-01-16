<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'restaurant_id',
        'table_id',
        'status',
        'customer_name',
        'total_amount',
        'created_by',
    ];
}
