<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToRestaurant;
use App\Models\OrderItem;

class Order extends Model
{
    use BelongsToRestaurant;
     protected $fillable = [
        'restaurant_id',
        'table_id',
        'status',
        'customer_name',
        'total_amount',
        'created_by',
    ];
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
