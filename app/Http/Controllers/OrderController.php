<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store($cartid)
    {
        $cart = Cart::find($cartid);
        $data = [
            'user_id' => auth()->id(),
            'product_id' => $cart->product_id,
            'price' => $cart->product->discounted_price != '' ? $cart->product->discounted_price : $cart->product->price,
            'quantity' => $cart->quantity,
            'name' => $cart->user->name,
            'phone' => '98798987',
            'address' => 'Chitwan',
        ];
        Order::create($data);
        $cart->delete();
        return redirect()->route('mycart')->with('success', 'Order placed successfully!');
    }

    public function store_esewa(Request $request, $cartid)
    {
        dd($request->all());
    }

    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function update_status($orderid, $status)
    {
        $order = Order::find($orderid);
        $order->status = $status;
        $order->save();
        return back()->with('success', 'Order status updated successfully!');
    }
}
