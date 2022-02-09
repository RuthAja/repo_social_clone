<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased min-h-screen flex items-center justify-center">
    <div class="w-1/2">
        <div class="p-10 boreder rounded-xl bg-gray-100 text-center">
            <h1 class="text-2xl">Intelligent Of Natural</h1>
            <h2 class="text-1xl my-3 text-gray-500">Ruth inc</h2>
            <a class="inline-flex items-center px-4 py-2 bg-blue-500 border
    border-transparent rounded-xl text-sm text-white capitalise tracking-widest hover:bg-blue-600
    active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring ring-blue-300 disabled:opacity-25 transition
    ease-in-out duration-150" href="{{ route('register') }}">Daftar</a>
            <a class="inline-flex items-center px-4 py-2 bg-blue-500 border
    border-transparent rounded-xl text-sm text-white capitalise tracking-widest hover:bg-blue-600
    active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring ring-blue-300 disabled:opacity-25 transition
    ease-in-out duration-150" href="{{ route('login') }}">Masuk</a>
        </div>
    </div>

</body>

</html>