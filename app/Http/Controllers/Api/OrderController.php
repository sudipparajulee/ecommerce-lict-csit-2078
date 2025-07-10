<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function myorders()
    {
        $orders = Order::where('user_id', auth()->id())->
        with('product')->get();
        return response()->json([
            'message' => 'Orders retrieved successfully',
            'success' => true,
            'data' => $orders,
        ]);
    }
}
