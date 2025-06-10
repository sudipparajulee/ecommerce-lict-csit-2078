<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
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
            'discounted_price' => 'nullable|numeric|lt:price',
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
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('order', 'asc')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'discounted_price' => 'nullable|numeric|lt:price',
            'description' => 'required|string',
            'stock' => 'required|numeric',
            'photopath' => 'nullable|image'
        ]);

        $product = Product::findOrFail($id);
        if($request->hasFile('photopath'))
        {
            // Handle file upload
            $file = $request->file('photopath');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/products'), $fileName);
            $data['photopath'] = $fileName;
            //unlink the old image
            if(file_exists(public_path('images/products/' . $product->photopath))) {
                unlink(public_path('images/products/' . $product->photopath));
            }
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        //unlink the image
        if(file_exists(public_path('images/products/' . $product->photopath))) {
            unlink(public_path('images/products/' . $product->photopath));
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
