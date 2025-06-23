<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $data['user_id'] = auth()->id();

        // Check if the product already exists in the cart for the user
        $existingCart = Cart::where('user_id', $data['user_id'])
            ->where('product_id', $data['product_id'])
            ->first();

        if ($existingCart) {
            // If it exists, update the quantity
            $existingCart->quantity = $data['quantity'];
            $existingCart->save();
            return back()->with('success', 'Product quantity updated in cart.');
        }

        Cart::create($data);
        return back()->with('success', 'Product added to cart successfully.');


    }
}
