<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
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
