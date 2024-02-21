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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 overflow-hidden login-background-color">
        <div class ="login_container">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
            <div class="circle5"></div>
            <div class="circle6"></div>
            <div class="circle7"></div>
            <div class="circle8"></div>
            <div class="circle9"></div>
        </div>
        <div class="flex justify-center items-center text-5xl mt-20 font-bold" style="color: #3B82F6;">
        @if(Route::currentRouteName() == 'login')
            Log In
        @elseif(Route::currentRouteName() == 'register')
            Register
        @endif
    </div>

         <!-- <div class="flex justify-center items-center text-5xl mt-20 font-bold"style="color:#3B82F6;" >Log In</div> -->
        <div>
            <div class="container-size container-bg-color pb-6 shadow-md flex flex-col">
                <div class="flex flex-row  justify-center items-center">
                    <div class="w-96 ml-3 sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-lg overflow-hidden sm:rounded-lg">
                        {{ $slot }}
                    </div>
                    <div class=" w-96 ml-2 mr-4">
                        <div>
                        <img src="{{ asset('images/logo-rec.png') }}" alt="Logo" class="w-80 ml-8"> 
                        </div>
                        <div class="text-5xl font-bold ml-20 mt-6" style="color:#3B82F6;">
                            CloudBloc
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
     
</html>
<style>
    
    .container-bg-color{
        background-color:#fbfbf9;
        
    }
    .container-size{
        width: 800px;
        height: 330px;
        display: flex;
        justify-content: center;
        justify-item: center;
        margin-left: 280px;
        margin-top: 40px;
    }

    .login-background-color{
         background-color:#fcfbfc;
    }
    .container{
        position: relative;
    }
    .circle1{
        position: absolute;
        top: -180px;
        left: -200px;
        width: 700px;
        height: 700px;
        background-color: #9fe6ff;
        border-radius: 100%;
        z-index: -1;
    }
    .circle2{
       position: absolute;
       top: -230px;
       left: -260px;
       width: 700px;
       height: 700px;
       background-color: #95dcff;
       border-radius: 100%;
       z-index: -1;
    }
    .circle3{
        position: absolute;
        top: -270px;
        left: -310px;
        width: 700px;
        height: 700px;
        background-color: #59a0ff;
        border-radius: 100%;
        z-index: -1;
    }
     .circle4 {
        position: absolute;
        top: -300px;
        left: -355px;
        width: 700px;
        height: 700px;
        background-color: #3B82F6;
        border-radius: 100%;
        z-index: -1;
    }

    .circle5 {
        position: absolute;
        right: -270px;
        top:-40px;
        width: 700px;
        height: 700px;
        background-color: #a9f0ff;
        border-radius: 100%;
        z-index: -1;
    }

    .circle6 {
        position: absolute;
        right: -300px;
        top: 30px;
        width: 700px;
        height: 700px;
        background-color: #81c8ff;
        border-radius: 100%;
        z-index: -1;
    }

    .circle7 {
        position: absolute;
        right: -300px;
        top: 100px;
        width: 700px;
        height: 700px;
        background-color: #6db4ff;
        border-radius: 100%;
        z-index: -1;
       
    }

    .circle8 {
        position: absolute;
        right: -340px;
        top: 170px;
        width: 700px;
        height: 700px;
        background-color: #3B82F6;
        border-radius: 100%;
        z-index: -1;
    }
    
</style>

