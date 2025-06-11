<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalcategories = Category::count();
        $totalproducts = Product::count();
        return view('dashboard',compact('totalcategories', 'totalproducts'));
    }
}
