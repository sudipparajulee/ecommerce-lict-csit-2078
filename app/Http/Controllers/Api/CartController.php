<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function mycart()
    {
        $cart = Cart::where('user_id', auth()->id())
            ->with('product')
            ->get();
        return response()->json([
            'message' => 'Cart retrieved successfully',
            'success' => true,
            'data' => $cart,
        ]);
    }
}
