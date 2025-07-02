@extends('layouts.master')
@section('content')
    <div class="px-20 py-10">
        <h2 class="font-bold text-3xl border-l-4 border-blue-500 pl-2">Search Result for - {{request('query')}}</h2>
        <div class="grid grid-cols-4 gap-4 mt-5">
            @foreach($products as $product)
            <a href="{{route('viewproduct',$product->id)}}" class="bg-white shadow-md rounded-lg p-4 hover:shadow-lg hover:-translate-y-2 transition-all duration-300">
                <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-full h-48 object-cover rounded-md mb-3">
                <h3 class="font-bold text-xl">{{$product->name}}</h3>
                <p class="text-blue-500 font-bold mt-2">
                    @if($product->discounted_price == '' || $product->discounted_price == 0)
                    Rs. {{$product->price}}
                    @else
                    <span class="line-through text-gray-500">Rs. {{$product->price}}</span>
                    Rs. {{$product->discounted_price}}
                    @endif
                </p>
            </a>
            @endforeach
        </div>
    </div>
@endsection
