<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ChefOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('restaurant_id', auth()->user()->restaurant_id)
            ->whereIn('status', ['placed', 'preparing', 'ready'])
            ->with('items.menuItem')
            ->orderBy('created_at')
            ->get();

        return response()->json($orders);
    }

    /**
     * Update order status (Chef only)
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:preparing,ready,completed'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Order status updated'
        ]);
    }
}
