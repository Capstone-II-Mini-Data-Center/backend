<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXpMIB8Fj5FOWmkMIIJLFOusZqW1T5S1oMYY" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-101 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="flex">
            <div class="w-1/6">
                @include('layouts.side-bar')
            </div>
            <div class="w-5/6 bg-white p-6 ">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
