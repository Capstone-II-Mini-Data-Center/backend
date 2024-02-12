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
           
        <div class="flex">
            <div class="flex flex-row justify-center items-center container-size container-bg-color shadow-md">
                <div class="">
                    <!-- <div> -->
                        <!-- <div class="text-blue-500 text-4xl font-bold mt-12"> -->
                            <!-- CloudiBloc -->
                        <!-- </div> -->
                    <!-- </div> -->
                    <div class="w-96 ml-3 sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-lg overflow-hidden sm:rounded-lg">
                        {{ $slot }}
                    </div>
                </div>
                <div class=" w-96 ml-2 mr-4">
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo">
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
        height: 400px;
        display: flex;
        justify-content: center;
        justify-item: center;
        margin-left: 280px;
        margin-top: 120px;
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
        background-color: #a9d0f0;
        border-radius: 100%;
        z-index: -1;
    }
    .circle2{
       position: absolute;
       top: -230px;
       left: -260px;
       width: 700px;
       height: 700px;
       background-color: #88beea;
       border-radius: 100%;
       z-index: -1;
    }
    .circle3{
        position: absolute;
        top: -270px;
        left: -310px;
        width: 700px;
        height: 700px;
        background-color: #66abe5;
        border-radius: 100%;
        z-index: -1;
    }
     .circle4 {
        position: absolute;
        top: -300px;
        left: -355px;
        width: 700px;
        height: 700px;
        background-color: #4599df;
        border-radius: 100%;
        z-index: -1;
    }

    .circle5 {
        position: absolute;
        right: -270px;
        top:-40px;
        width: 700px;
        height: 700px;
        background-color: #cbe2f6;
        border-radius: 100%;
        z-index: -1;
    }

    .circle6 {
        position: absolute;
        right: -300px;
        top: 30px;
        width: 700px;
        height: 700px;
        background-color: #a9d0f0;
        border-radius: 100%;
        z-index: -1;
    }

    .circle7 {
        position: absolute;
        right: -300px;
        top: 100px;
        width: 700px;
        height: 700px;
        background-color: #88beea;
        border-radius: 100%;
        z-index: -1;
       
    }

    .circle8 {
        position: absolute;
        right: -340px;
        top: 170px;
        width: 700px;
        height: 700px;
        background-color: #66abe5;
        border-radius: 100%;
        z-index: -1;
    }
     /* .circle9 {
        position: absolute;
        right: 550px;
        top:60px;
        width: 30px;
        height: 30px;
        background-color: #66abe5;
        border-radius: 100%;
        z-index: -1;
    }
     */
   .login_container{
       
        /* background-color:red;    
        width:100px; */
        
        /* position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 1000px;
        height: 500px;
        margin-top: 250px;
        margin-left:380px;
        background-color:#fbfbf9;
        box-shadow: 0 4px 8px rgba(128, 128, 128, 0.5); */
   }

    
</style>

