@extends('layouts.master')
@section('content')
    <div class="grid grid-cols-5 gap-4 px-20 py-10">
        <div class="col-span-2">
            <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-full h-96 object-cover rounded-md mb-3">
        </div>
        <div class="col-span-2 border-x-2 px-4">
            <h2 class="font-bold text-3xl">{{$product->name}}</h2>
            <p class="text-blue-500 font-bold mt-2">
                    @if($product->discounted_price == '' || $product->discounted_price == 0)
                    Rs. {{$product->price}}
                    @else
                    <span class="line-through text-gray-500">Rs. {{$product->price}}</span>
                    Rs. {{$product->discounted_price}}
                    @endif
                </p>
        </div>
    </div>
@endsection
