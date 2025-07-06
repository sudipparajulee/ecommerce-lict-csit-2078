@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-blue-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-user-line"></i>
                Total Users
            </h3>
            <p class="text-4xl text-right font-bold">{{$totalusers}}</p>
        </div>

        <div class="bg-red-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-shopping-cart-2-line"></i>
                Total Orders
            </h3>
            <p class="text-4xl text-right font-bold">{{$totalorders}}</p>
        </div>

        <div class="bg-green-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-exchange-dollar-line"></i>
                Total Revenue
            </h3>
            <p class="text-4xl text-right font-bold">Rs. {{$totalrevenue}}</p>
        </div>

        <div class="bg-yellow-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-menu-2-line"></i>
                Total Categories
            </h3>
            <p class="text-4xl text-right font-bold">{{$totalcategories}}</p>
        </div>

        <div class="bg-green-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-shopping-cart-fill"></i>
                Total Products
            </h3>
            <p class="text-4xl text-right font-bold">{{$totalproducts}}</p>
        </div>

        <div class="bg-blue-100 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-xl">
                <i class="ri-shopping-cart-line"></i>
                Pending Orders
            </h3>
            <p class="text-4xl text-right font-bold">{{$totalpendingorders}}</p>
        </div>

        <div>
            <canvas id="myChart"></canvas>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: {!! $allcategories !!},
      datasets: [{
        label: '# of Products',
        data: {!! $allproducts !!},
        borderWidth: 1
      }]
    },
  });
</script>
@endsection
