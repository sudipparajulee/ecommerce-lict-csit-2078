<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $latestproducts = Product::latest()->take(4)->get();
        return view('welcome',compact('latestproducts'));
    }

    public function viewproduct($id)
    {
        $product = Product::findOrFail($id);
        $relatedproducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->take(4)
            ->get();
        return view('viewproduct', compact('product','relatedproducts'));
    }

    public function categoryproduct($catid)
    {
        $category = Category::findOrFail($catid);
        $products = Product::where('category_id', $catid)->latest()->paginate(20);
        return view('categoryproduct', compact('products', 'category'));
    }

    public function mycart()
    {
        $userid = auth()->id();
        $carts = Cart::where('user_id', $userid)->get();
        foreach($carts as $cart)
        {
            if($cart->product->stock < $cart->quantity)
            {
                $cart->quantity = $cart->product->stock;
                $cart->save();
            }
        }
        return view('cart', compact('carts'));
    }

    public function myorders()
    {
        $userid = auth()->id();
        $orders = Order::where('user_id', $userid)->latest()->get();
        return view('myorders', compact('orders'));
    }

    public function cancelorder(Request $request)
    {
        $orderid = $request->input('orderid');
        $order = Order::where('id', $orderid)->where('user_id', auth()->id())->first();
        if($order) {
            $order->status = 'Cancelled';
            $order->save();
            return redirect()->back()->with('success', 'Order cancelled successfully.');
        }
    }

    public function checkout($cartid)
    {
        $cart = Cart::findOrFail($cartid);
        return view('checkout', compact('cart'));
    }

    public function search(Request $request)
    {
        $qry = $request->input('query');
        $products = Product::where('name','like','%'.$qry.'%')->get();
        return view('search', compact('products'));
    }
}
