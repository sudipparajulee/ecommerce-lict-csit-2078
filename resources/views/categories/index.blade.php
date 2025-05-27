@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="flex justify-end mb-4">
        <a href="{{route('categories.create')}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg ">Add Category</a>
    </div>
    <table class="w-full">
        <tr class="bg-gray-200">
            <th class="p-2 border border-gray-50">Order</th>
            <th class="p-2 border border-gray-50">Category Name</th>
            <th class="p-2 border border-gray-50">Action</th>
        </tr>
        @foreach($categories as $category)
        <tr class="text-center">
            <td class="p-2 border border-gray-100">{{$category->order}}</td>
            <td class="p-2 border border-gray-100">{{$category->name}}</td>
            <td class="p-2 border border-gray-100">
                <a href="{{route('categories.edit',$category->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded-md">Edit</a>
                <a href="{{route('categories.destroy',$category->id)}}" class="bg-red-600 text-white px-2 py-1 rounded-md">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
