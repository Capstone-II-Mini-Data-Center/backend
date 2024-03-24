<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"--}}
{{--          integrity="sha512-xwfnCs4AV4iR+A2I8r1GqwsEB6S+SNjDQpj1L6aWgXzlF3lcB+ww2fGrIAs9LYFIIprI0a5SGr5PQIClqWJyfxA=="--}}
{{--          crossorigin="anonymous"/>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
{{--    <div class="min-h-screen bg-gray-101 dark:bg-gray-900">--}}
{{--        @include('confirmation-modal')--}}
{{--        @include('layouts.navigation')--}}

{{--        <!-- Page Content -->--}}
{{--        <main class="flex">--}}
{{--            <div class="w-1/6">--}}
{{--                @include('layouts.side-bar')--}}
{{--            </div>--}}
{{--            <div class="w-5/6 bg-white p-6 ">--}}
{{--                @yield('content')--}}
{{--            </div>--}}
{{--        </main>--}}
{{--    </div>--}}
<div class="flex bg-gray-100 w-full overflow-x-hidden" x-data="{ isSidebarExpanded: true }">
    <!-- sidebar -->
    @include('layouts.side-bar')
    <div class="flex flex-col flex-grow overflow-hidden">
        <div class="">
            @include('layouts.navigation')

            <div class="m-5 flex flex-col flex-grow ">
                @yield('content')
            </div>

        </div>
    </div>

</div>
</div>
</body>

</html>
