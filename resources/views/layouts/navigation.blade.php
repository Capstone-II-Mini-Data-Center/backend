<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xwfnCs4AV4iR+A2I8r1GqwsEB6S+SNjDQpj1L6aWgXzlF3lcB+ww2fGrIAs9LYFIIprI0a5SGr5PQIClqWJyfxA==" crossorigin="anonymous" />

<nav x-data="{ open: false }" class="bg-white  shadow-md dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 sticky top-0 z-10">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="w-24  -mt-4">
                    <div class="">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" >
                        </a>
                    </div>
                </div>
                <div>
                    <div class="profile" id="profileDropdown" onclick="toggleDropdown()">
                        <img src="{{ asset('images/user.png') }}" alt="User">
                    </div>
                        <div class="admin_name">
                            {{$admins->name}}
                        </div>
                </div>
           
            </div>
            <div class="hidden mt-20 -mr-4 sm:flex sm:items-center sm:ms-6" id="dropdown">
                <div class="dropdown_content hidden bg-gray-100 rounded-md pl-5 pr-5 pb-2 pt-2">
                    <!-- <a href="{{ route('profile.edit') }}" class="hover:text-gray-300">Profile</a> -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button onclick="event.preventDefault(); this.closest('form').submit();" class="hover:text-gray-300">Log Out</button>
                    </form>
                </div>
            </div>

            <script>
                function toggleDropdown() {
                    var dropdownContent = document.querySelector('.dropdown_content');
                    dropdownContent.classList.toggle('hidden');
                  
                }
            </script>
            
            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>


<style>
    .profile{
        position: absolute;
        top:7px;
        right:40px;
        width: 50px;
        height: 50px;
        border-radius: 100%;
        box-shadow: 0 4px 8px rgba(128, 128, 128, 0.5); 
        /* background-color: red;  */
        
    }
    .admin_name{
        position: absolute;
        right:100px;
        top: 20px;
    }
</style>