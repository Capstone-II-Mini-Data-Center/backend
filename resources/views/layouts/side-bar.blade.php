
<!-- resources/views/layouts/sidebar.blade.php -->

<div class="bg-white text-blue-500 shadow-lg h-screen w-1/5 fixed left-0">
    <!-- Sidebar content -->
    <div class="p-4">
        <!-- Your sidebar content goes here -->
        <div class="flex flex-row items-center block py-2 px-2  rounded {{ request()->is('dashboard') ? 'bg-blue-500 text-white' : '' }}" >
            <div class="flex items-center">
                <span class="material-symbols-outlined">
                    dashboard
                </span>
            </div>
            <div>
                 <a href="#" class="ml-3" >
                    Dashboard
                </a>
            </div>
        </div>
        <div class="flex flex-row items-center block py-2 px-2 rounded mt-2 {{ request()->routeIs('users.index') ? 'bg-blue-500 text-white' : '' }}">
            <div class="flex items-center">
                <span class="material-symbols-outlined">
                    group
                </span>
            </div>
            <div class="ml-3">
                <a href="{{ route('users.index') }}">
                    List User
                </a> 
            </div>
        </div>
        <div class="flex flex-row items-center block py-2 px-2 rounded mt-2 {{ request()->routeIs('manage_package.index') ? 'bg-blue-500 text-white' : '' }}">
            <div class="flex items-center">
                <!-- <img src="{{ asset('images/package-icon.png') }}" alt="icons" class="h-8 w-8 mr-3"> -->
                <span class="material-symbols-outlined">
                 package_2
                </span>
            </div>
            <div class="ml-3">
               <a href="{{ route('manage_package.index') }}">
                    Manage Package
                </a> 
            </div>
        </div>
         <div class="flex flex-row items-center block py-2 px-2 rounded mt-2 {{ request()->routeIs('manage_banner.*') ? 'bg-blue-500 text-white' : '' }}">
            <div class="flex items-center">
                <!-- <img src="{{ asset('images/banner-icon.png') }}" alt="icons" class="h-6 w-6 mr-3"> -->
                <span class="material-symbols-outlined">
                    ad_group
                </span>
            </div>
            <div class="ml-3">
                <a href="{{ route('manage_banner.index') }}">
                    Manage Banner
                </a> 
            </div>
        </div> 
        <div class="flex flex-row items-center block py-2 px-2 rounded mt-2 {{ request()->routeIs('manage_order.*') ? 'bg-blue-500 text-white' : '' }}">
            <div class="flex items-center">
                <!-- <img src="{{ asset('images/order-icon.png') }}" alt="icons" class="h-7 w-7 mr-3"> -->
                <span class="material-symbols-outlined">
                    shopping_cart
                </span>
            </div>
            <div class="ml-3">
                <a href="{{ route('manage_order.index') }}">
                    Manage Order
                </a> 
            </div>
        </div>
    </div>
</div>


