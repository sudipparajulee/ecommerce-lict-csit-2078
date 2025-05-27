<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        $categories = Category::orderBy('order','asc')->get();
        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'order' => 'required|numeric',
            'name' => 'required'
        ]);
        Category::create($data);
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'order' => 'required|numeric',
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->update($data);
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index');
    }
}
