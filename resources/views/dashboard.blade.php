@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-blue-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-user-line"></i>
                Total Users
            </h3>
            <p class="text-4xl text-right font-bold">55</p>
        </div>

        <div class="bg-red-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-shopping-cart-2-line"></i>
                Total Orders
            </h3>
            <p class="text-4xl text-right font-bold">55</p>
        </div>

        <div class="bg-green-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-exchange-dollar-line"></i>
                Total Revenue
            </h3>
            <p class="text-4xl text-right font-bold">55</p>
        </div>

        <div class="bg-yellow-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-menu-2-line"></i>
                Total Categories
            </h3>
            <p class="text-4xl text-right font-bold">55</p>
        </div>

        <div class="bg-green-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-shopping-cart-fill"></i>
                Total Products
            </h3>
            <p class="text-4xl text-right font-bold">55</p>
        </div>

        <div class="bg-blue-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-shopping-cart-line"></i>
                Pending Orders
            </h3>
            <p class="text-4xl text-right font-bold">55</p>
        </div>

    </div>
@endsection
