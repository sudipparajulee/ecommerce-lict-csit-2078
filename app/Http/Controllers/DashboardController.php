<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalusers = User::where('role', 'user')->count();
        $totalorders = Order::where('status','!=', 'Cancelled')->count();
        $allorders = Order::where('status', 'Delivered')->get();
        $totalrevenue = 0;
        foreach ($allorders as $order) {
            $totalrevenue += $order->quantity * $order->price;
        }
        $totalcategories = Category::count();
        $totalproducts = Product::count();
        $totalpendingorders = Order::where('status', 'Pending')->count();
        $allcat = Category::orderBy('priority', 'asc')->get();
        foreach($allcat as $cat){
            $cat->totalproducts = Product::where('category_id', $cat->id)->count();
        }
        // for the chart,
        $allcategories = $allcat->pluck('name')->toArray();
        $allproducts = $allcat->pluck('totalproducts')->toArray();
        $allcategories = json_encode($allcategories);
        $allproducts = json_encode($allproducts);
        return view('dashboard',compact('totalusers', 'totalorders', 'totalrevenue', 'totalcategories', 'totalproducts', 'totalpendingorders', 'allcategories', 'allproducts'));
    }
}
