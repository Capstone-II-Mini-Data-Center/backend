<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
{{--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xwfnCs4AV4iR+A2I8r1GqwsEB6S+SNjDQpj1L6aWgXzlF3lcB+ww2fGrIAs9LYFIIprI0a5SGr5PQIClqWJyfxA==" crossorigin="anonymous" />--}}
{{--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
{{--        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>--}}

    </head>
    <body class="antialiased">
{{--        <div class="flex bg-gray-300 min-h-screen" x-data="{ isSidebarExpanded: true }">--}}
{{--            <aside class="flex flex-col text-gray-300 bg-gray-800 transition-all duration-300 ease-in-out" :class="isSidebarExpanded ? 'w-64' : 'w-20'">--}}
{{--                <a href="#" class="h-14 flex items-center px-4 bg-gray-900 hover:text-gray-100 hover:bg-opacity-50 focus:outline-none focus:text-gray-100 focus:bg-opacity-50 overflow-hidden">--}}
{{--                    <svg viewBox="0 0 20 20" fill="currentColor" class="h-12 w-12 flex-shrink-0">--}}
{{--                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />--}}
{{--                    </svg>--}}
{{--                    <span class="ml-2 text-xl font-medium duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Dashboard</span>--}}
{{--                </a>--}}
{{--                <nav class="p-4 space-y-2 font-medium">--}}
{{--                    <a href="#" class="flex items-center h-10 px-3 text-white bg-blue-600 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline">--}}
{{--                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 flex-shrink-0">--}}
{{--                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />--}}
{{--                        </svg>--}}
{{--                        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Home</span>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="flex items-center h-10 px-3 hover:bg-blue-600 hover:bg-opacity-25 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline">--}}
{{--                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 flex-shrink-0">--}}
{{--                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />--}}
{{--                        </svg>--}}
{{--                        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Members</span>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="flex items-center h-10 px-3 hover:bg-blue-600 hover:bg-opacity-25 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline">--}}
{{--                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 flex-shrink-0">--}}
{{--                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}
{{--                        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Reports</span>--}}
{{--                    </a>--}}
{{--                </nav>--}}
{{--                <div class="border-t border-gray-700 p-4 font-medium mt-auto">--}}
{{--                    <a href="#" class="flex items-center h-10 px-3 hover:text-gray-100 hover:bg-gray-600 hover:bg-opacity-25 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline">--}}
{{--                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 flex-shrink-0">--}}
{{--                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}
{{--                        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Settings</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </aside>--}}
{{--            <div class="flex-1 flex flex-col">--}}
{{--                <header class="h-14 flex items-center px-6 bg-white">--}}
{{--                    <button class="p-2 -ml-2 mr-2" @click="isSidebarExpanded = !isSidebarExpanded">--}}
{{--                        <svg viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 transform" :class="isSidebarExpanded ? 'rotate-180' : 'rotate-0'">--}}
{{--                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>--}}
{{--                            <line x1="4" y1="6" x2="14" y2="6" />--}}
{{--                            <line x1="4" y1="18" x2="14" y2="18" />--}}
{{--                            <path d="M4 12h17l-3 -3m0 6l3 -3" />--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <span class="font-medium">Header</span>--}}
{{--                </header>--}}
{{--                <main class="flex-1 p-6">--}}
{{--                    <p class="font-medium">Click on the menu button on top to expand/shrink the sidebar </p>--}}
{{--                    p>lorem--}}
{{--                </main>--}}
{{--            </div>--}}
{{--        </div>--}}

<div class="flex h-screen bg-gray-100" x-data="{ isSidebarExpanded: true }">
    <!-- sidebar -->
    @include('layouts.side-bar')

    <div class="flex flex-col">
        <!-- navbar -->
        @include('layouts.navigation')
        <!-- main content -->
        <div class="flex flex-col overflow-y-auto">

            <div class="p-4">
                <h1 class="text-2xl font-bold">Welcome to my dashboard!</h1>
                <p class="mt-2 text-gray-600">This is an example dashboard using Tailwind CSS.</p>
                p>lorem500

            </div>
        </div>
    </div>
</div>
    </body>

