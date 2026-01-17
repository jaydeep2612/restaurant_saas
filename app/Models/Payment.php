<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToRestaurant;

class Payment extends Model
{
    use BelongsToRestaurant;
    protected $fillable = [
        'restaurant_id',
        'invoice_id',
        'amount',
        'payment_method',
        'payment_status',
        'transaction_id',
        'paid_at',
        'created_by',
    ];
}
