<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\RestaurantTable;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:restaurant_tables,id',
            'customer_name' => 'required|string|max:255',
            'items' => 'required|array|min:1',
            'items.*.menu_item_id' => 'required|exists:menu_items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($request) {

            // Lock table
            $table = RestaurantTable::lockForUpdate()->find($request->table_id);

            if ($table->status === 'available') {
                $table->update([
                    'status' => 'occupied',
                    'current_customer_name' => $request->customer_name,
                ]);
            }

            // Create order
            $order = Order::create([
                'restaurant_id' => auth()->user()->restaurant_id,
                'table_id' => $table->id,
                'customer_name' => $request->customer_name,
                'status' => 'placed',
                'total_amount' => 0,
            ]);

            $total = 0;

            foreach ($request->items as $item) {
                $menuItem = \App\Models\MenuItem::find($item['menu_item_id']);

                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_item_id' => $menuItem->id,
                    'quantity' => $item['quantity'],
                    'price' => $menuItem->price,
                ]);

                $total += $menuItem->price * $item['quantity'];
            }

            $order->update(['total_amount' => $total]);

            return response()->json([
                'message' => 'Order placed successfully',
                'order_id' => $order->id,
            ], 201);
        });
    }

    /**
     * Cancel order
     */
    public function cancel(Order $order)
    {
        if ($order->status !== 'placed') {
            return response()->json([
                'message' => 'Order cannot be cancelled now'
            ], 422);
        }

        $order->update(['status' => 'cancelled']);

        return response()->json([
            'message' => 'Order cancelled successfully'
        ]);
    }
}
