@extends('layouts.master')
@section('content')
    <div class="shadow-lg p-4 flex justify-between items-center border rounded-lg">
                <div class="flex gap-4">
                    <img src="{{ asset('images/products/'.$cart->product->photopath) }}" alt="" class="h-32 w-32 object-cover">

                    <div>
                        <h1 class="font-bold text-xl">{{ $cart->product->name }}</h1>
                        <p class="text-gray-500">
                            @if($cart->product->discounted_price)
                                <span class="text-red-600 font-bold text-lg">
                                    Rs. {{ $cart->product->discounted_price }}
                                </span>
                                <span class="text-gray-500 line-through">
                                    Rs. {{ $cart->product->price }}
                                </span>
                            @else
                                <span class="text-red-600 font-bold text-lg">
                                    Rs. {{ $cart->product->price }}
                                </span>
                            @endif
                        </p>
                        <p class="text-gray-500">Quantity: {{ $cart->quantity }}</p>
                    </div>
                </div>
                <div class="grid gap-4">
                    <form action="{{route('order.store', $cart->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-600 block text-center text-white px-4 py-2 rounded-lg">Cash On delivery</button>
                    </form>
                    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                        <input type="hidden" id="amount" name="amount" value="100" required>
                        <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
                        <input type="hidden" id="total_amount" name="total_amount" value="110" required>
                        <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="241028" required>
                        <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
                        <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                        <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                        <input type="hidden" id="success_url" name="success_url" value="{{route('order.esewa',[$cart->id])}}" required>
                        <input type="hidden" id="failure_url" name="failure_url" value="https://developer.esewa.com.np/failure" required>
                        <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                        <input type="hidden" id="signature" name="signature" value="i94zsd3oXF6ZsSr/kGqT4sSzYQzjj1W/waxjWyRwaME=" required>
                        <input value="Pay with eSewa" type="submit" class="bg-green-600 text-white px-8 py-2 rounded-lg">
                    </form>
                </div>
            </div>

            @php
                $totalamount = $cart->product->discounted_price != '' ? $cart->product->discounted_price * $cart->quantity : $cart->product->price * $cart->quantity;
                $transaction_uuid = time() . rand(1000, 9999);
                $message = "total_amount=$totalamount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
                $secret_key = '8gBm/:&EnhH.1/q';
                $signature = hash_hmac('sha256', $message, $secret_key, true);
                $signature = base64_encode($signature);
            @endphp

            <script>
                document.getElementById('amount').value = '{{ $totalamount }}';
                document.getElementById('total_amount').value = '{{ $totalamount}}';
                document.getElementById('transaction_uuid').value = '{{ $transaction_uuid }}';
                document.getElementById('signature').value = '{{ $signature }}';
            </script>
@endsection
