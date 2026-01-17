<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToRestaurant;

class Invoice extends Model
{
    use BelongsToRestaurant;
     protected $fillable = [
        'restaurant_id',
        'order_ids',
        'subtotal',
        'tax',
        'discount',
        'final_amount',
        'payment_status',
        'created_by',
    ];

    protected $casts = [
        'order_ids' => 'array',
    ];
}
