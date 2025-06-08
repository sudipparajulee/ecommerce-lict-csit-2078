@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <select name="category_id" id="" class="border border-gray-300 p-2 rounded-md w-full mb-3">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <input type="text" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="name" placeholder="Product Name" value="{{old('name')}}" >
        @error('name')
            <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
        @enderror
        <input type="text" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="price" placeholder="Price" value="{{old('price')}}" >
        @error('price')
            <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
        @enderror
        <input type="text" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="discounted_price" placeholder="Discounted Price" value="{{old('discounted_price')}}" >
        @error('discounted_price')
            <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
        @enderror
        <textarea class="border border-gray-300 p-2 rounded-md w-full mb-3" name="description" placeholder="Description">{{old('description')}}</textarea>
        @error('description')
            <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
        @enderror
        <input type="number" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="stock" placeholder="Stock" value="{{old('stock')}}" >
        @error('stock')
            <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
        @enderror
        <input type="file" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="photopath" placeholder="Picture" value="{{old('photopath')}}" >
        @error('photopath')
            <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
        @enderror
        <div class="flex justify-center mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg ">Add Product</button>
            <a href="{{route('products.index')}}" class="bg-red-600 text-white px-8 py-2 rounded-lg ml-2">Cancel</a>
        </div>
    </form>
@endsection
