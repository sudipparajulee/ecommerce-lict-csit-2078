<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
