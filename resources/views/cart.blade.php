@extends('layouts.master')
@section('content')
    <div class="px-20 py-10">
        <h2 class="font-bold text-3xl border-l-4 border-blue-500 pl-2">My Cart</h2>
        @if($carts->count() > 0)

        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
