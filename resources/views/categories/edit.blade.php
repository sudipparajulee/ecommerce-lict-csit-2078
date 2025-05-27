@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')

    <form action="{{route('categories.update',$category->id)}}" method="POST">
        @csrf
        <input type="text" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="order" placeholder="Order" value="{{$category->order}}" >
        @error('order')
            <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
        @enderror
        <input type="text" class="border border-gray-300 p-2 rounded-md w-full"  name="name" placeholder="Category Name" value="{{$category->name}}" >
        @error('name')
            <div class="text-red-500 mb-3">{{$message}}</div>
        @enderror
        <div class="flex justify-center mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg ">Update Category</button>
            <a href="{{route('categories.index')}}" class="bg-red-600 text-white px-8 py-2 rounded-lg ml-2">Cancel</a>
        </div>
    </form>
@endsection
