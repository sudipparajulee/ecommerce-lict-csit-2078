@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="flex justify-end mb-4">
        <a href="{{route('products.create')}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg ">Add Product</a>
    </div>
    <table class="w-full">
        <tr class="bg-gray-200">
            <th class="p-2 border border-gray-50">Picture</th>
            <th class="p-2 border border-gray-50">Product Name</th>
            <th class="p-2 border border-gray-50">Price</th>
            <th class="p-2 border border-gray-50">Discounted Price</th>
            <th class="p-2 border border-gray-50">Description</th>
            <th class="p-2 border border-gray-50">Stock</th>
            <th class="p-2 border border-gray-50">Category</th>
            <th class="p-2 border border-gray-50">Action</th>
        </tr>
        <tr class="text-center">
            <td class="p-2 border border-gray-100">Picture</td>
            <td class="p-2 border border-gray-100">Product Name</td>
            <td class="p-2 border border-gray-100">100</td>
            <td class="p-2 border border-gray-100">80</td>
            <td class="p-2 border border-gray-100">this is description</td>
            <td class="p-2 border border-gray-100">5</td>
            <td class="p-2 border border-gray-100">Electronics</td>
            <td class="p-2 border border-gray-100">
                <a href="" class="bg-blue-600 text-white px-2 py-1 rounded-md">Edit</a>
                <a href=""
                    onclick="return confirm('Are you sure to delete?');"
                    class="bg-red-600 text-white px-2 py-1 rounded-md">Delete</a>
            </td>
        </tr>
    </table>
@endsection
