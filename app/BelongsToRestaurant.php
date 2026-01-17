<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;

trait BelongsToRestaurant
{
   protected static function bootBelongsToRestaurant()
    {
        static::addGlobalScope('restaurant', function (Builder $builder) {
            if (auth()->check()) {
                $builder->where(
                    $builder->getModel()->getTable() . '.restaurant_id',
                    auth()->user()->restaurant_id
                );
            }
        });
    }
}
