<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @php
        $categories = \App\Models\Category::orderBy('order', 'asc')->get();
    @endphp
    <nav class="flex justify-between items-center py-3 px-12 bg-blue-600 text-white">
        <h1 class="font-bold text-lg">LOGO</h1>
        <div class="flex gap-3">
            <a href="/">Home</a>
            @foreach ($categories as $category)
                <a href="{{route('categoryproduct',$category->id)}}">{{$category->name}}</a>
            @endforeach
            @auth
                <a href="">Hi, {{auth()->user()->name}}</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white">Logout</button>
                </form>
            @else
                <a href="/login">Login</a>
            @endauth
        </div>
    </nav>

    @yield('content')

    <footer class="text-center bg-gray-800 text-white p-4 mt-5">
        <p>&copy; 2025 My Laravel Project</p>
        <p>Created by You</p>
    </footer>
</body>
</html>
