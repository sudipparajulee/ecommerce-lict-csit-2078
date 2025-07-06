<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $order = Order::create($data);
        $cart->delete();
        return redirect()->route('mycart')->with('success', 'Order placed successfully!');
    }

    public function store_esewa(Request $request, $cartid)
    {
        $data = $request->data;
        //decode data
        $data = base64_decode($data);
        //convert to array
        $data = json_decode($data, true);
        if($data['status'] == 'COMPLETE')
        {
            $cart = Cart::find($cartid);
            $orderdata = [
                'user_id' => auth()->id(),
                'product_id' => $cart->product_id,
                'price' => $cart->product->discounted_price != '' ? $cart->product->discounted_price : $cart->product->price,
                'quantity' => $cart->quantity,
                'name' => $cart->user->name,
                'phone' => '98798987',
                'address' => 'Chitwan',
                'payment_method' => 'eSewa',
                'payment_status' => 'Paid'
            ];
            Order::create($orderdata);
            $cart->delete();
            return redirect()->route('mycart')->with('success', 'Order placed successfully!');
        }
    }

    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function update_status($orderid, $status)
    {
        $order = Order::find($orderid);
        //update the stock
        if(($order->status == 'Pending' || $order->status == 'Cancelled') && ($status == 'Processing' || $status == 'Delivered')) {
            $order->product->stock -= $order->quantity;
            $order->product->save();
        }
        if($order->status == 'Processing' || $order->status == 'Delivered') {
            if($status == 'Pending' || $status == 'Cancelled') {
                $order->product->stock += $order->quantity;
                $order->product->save();
            }
        }
        $order->status = $status;
        $order->payment_status = $status == 'Delivered' ? 'Paid' : ($order->payment_method == 'eSewa' ? 'Paid' : 'Unpaid');
        $order->save();
        //Send email to user
        $msg = [
            'name' => $order->name,
            'status' => $status,
        ];
        Mail::send('emails.orderstatus', $msg, function($message) use ($order) {
            $message->to($order->user->email)
                    ->subject('Order Status Update');
        });
        return back()->with('success', 'Order status updated successfully!');
    }
}
