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
                <p>In Stock: {{$product->stock}}</p>
                <div class="mt-4 flex">
                    <span class="bg-gray-300 px-4 py-1 cursor-pointer" id="decrement">-</span>
                    <input type="text" name="quantity" id="quantity" value="1" min="1" class="border w-12 text-center p-0 py-1" readonly>
                    <span class="bg-gray-300 px-4 py-1 cursor-pointer" id="increment">+</span>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded mt-4">Add to Cart</button>
        </div>
        <div>
            <p>Free Delivery</p>
            <p>24/7 support</p>
        </div>
    </div>
    <div class="px-20 py-10">
        <h2 class="text-2xl font-bold"> Product Description</h2>
        <p class="py-4">{{$product->description}}</p>
    </div>
    <div class="px-20 py-10">
        <h2 class="font-bold text-3xl border-l-4 border-blue-500 pl-2">Related Products</h2>
        <div class="grid grid-cols-4 gap-4 mt-5">
            @foreach($relatedproducts as $product)
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


    <script>
        let quantity = document.getElementById('quantity');
        let stock = {{$product->stock}};
        document.getElementById('increment').addEventListener('click', function() {
            if(parseInt(quantity.value) < stock) {
                quantity.value = parseInt(quantity.value) + 1;
            }
        });
        document.getElementById('decrement').addEventListener('click', function() {
            if(parseInt(quantity.value) > 1) {
                quantity.value = parseInt(quantity.value) - 1;
            }
        });
    </script>
@endsection
