<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        $categories = Category::orderBy('order', 'asc')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'discounted_price' => 'nullable|numeric',
            'description' => 'required|string',
            'stock' => 'required|numeric',
            'photopath' => 'required|image'
        ]);

        // Handle file upload
        $file = $request->file('photopath');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/products'), $fileName);
        $data['photopath'] = $fileName;

        // Create the product
        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product Created Successfully');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
