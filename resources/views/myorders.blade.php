@extends('layouts.master')
@section('content')
    <div class="px-20 py-10">
        <h1 class="text-2xl font-bold mb-5">My Orders</h1>
        <table class="w-full">
        <tr class="bg-gray-200">
            <th class="p-2 border border-gray-50">Order Date</th>
            <th class="p-2 border border-gray-50">Product Picture</th>
            <th class="p-2 border border-gray-50">Product Name</th>
            <th class="p-2 border border-gray-50">Customer Name</th>
            <th class="p-2 border border-gray-50">Customer Phone</th>
            <th class="p-2 border border-gray-50">Customer Address</th>
            <th class="p-2 border border-gray-50">Price</th>
            <th class="p-2 border border-gray-50">Quantity</th>
            <th class="p-2 border border-gray-50">Total Amount</th>
            <th class="p-2 border border-gray-50">Payment Method</th>
            <th class="p-2 border border-gray-50">Payment Status</th>
            <th class="p-2 border border-gray-50">Order Status</th>
            <th class="p-2 border border-gray-50">Action</th>
        </tr>
        @foreach($orders as $order)
        <tr class="text-center">
            <td class="p-2 border">{{ $order->created_at }}</td>
            <td class="p-2 border">
                <img src="{{ asset('images/products/' . $order->product->photopath) }}" class="w-16 mx-auto h-16 object-cover">
            </td>
            <td class="p-2 border">{{ $order->product->name }}</td>
            <td class="p-2 border">{{ $order->name }}</td>
            <td class="p-2 border">{{ $order->phone }}</td>
            <td class="p-2 border">{{ $order->address }}</td>
            <td class="p-2 border">{{ $order->price }}</td>
            <td class="p-2 border">{{ $order->quantity }}</td>
            <td class="p-2 border">{{ $order->price * $order->quantity }}</td>
            <td class="p-2 border">{{ $order->payment_method }}</td>
            <td class="p-2 border">{{ $order->payment_status }}</td>
            <td class="p-2 border">{{ $order->status }}</td>
            <td class="p-2 border">
                @if($order->status == 'Pending')
                    <form action="{{route('order.cancel')}}" method="POST">
                        @csrf
                        <input type="hidden" name="orderid" value="{{ $order->id }}">
                        <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded-lg">Cancel</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    </div>
@endsection
