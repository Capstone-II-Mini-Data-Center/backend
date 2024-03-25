<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xwfnCs4AV4iR+A2I8r1GqwsEB6S+SNjDQpj1L6aWgXzlF3lcB+ww2fGrIAs9LYFIIprI0a5SGr5PQIClqWJyfxA==" crossorigin="anonymous" />

<nav x-data="{ open: false }" class="bg-white  shadow-md dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 sticky top-0 z-10">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex justify-between">
                <!-- Logo -->
                <div class="">
                    <div class="flex justify-between items-center gap-3">
                        <div class="">
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="96px">
                            </a>
                        </div>
                        <!-- <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" >
                        </a> -->
                        <div class="flex items-center mt-1 text-xl font-bold" style="color: #3B82F6;" >
                            CloudBloc
                        </div>
                    </div>
                </div>
                <div>
                    <div class="profile" id="profileDropdown" onclick="toggleDropdown()">
                        <img src="{{ asset('images/user.png') }}" alt="User" class="w-10">
                    </div>
                        <div class="admin_name text-lg" style="color: #3B82F6;">
                            {{$admins->name}}
                        </div>
                </div>

            </div>
            <div class="hidden mt-20 -mr-4 sm:flex sm:items-center sm:ms-6" id="dropdown">
                <div class="dropdown_content hidden bg-gray-100 rounded-md pl-5 pr-5 pb-2 pt-2">
                    <a href="{{ route('profile.edit') }}" class=" text-blue-500 hover:text-orange-300" >Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button onclick="event.preventDefault(); this.closest('form').submit();" class="text-blue-500 hover:text-orange-300">Log Out</button>
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
        top:10px;
        right:50px;
        width: 40px;
        height: 40px;
        border-radius: 100%;
        box-shadow: 0 4px 8px rgba(128, 128, 128, 0.5);
        /* background-color: red;  */

    }
    .admin_name{
        position: absolute;
        right:100px;
        top: 18px;
    }
</style>
{{--<div class="h-14 flex items-center justify-between bg-white border-b border-gray-200">--}}
{{--    <header class="flex items-center px-6 bg-white">--}}
{{--        <button class="p-2 -ml-2 mr-2" @click="isSidebarExpanded = !isSidebarExpanded">--}}
{{--            <svg viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"--}}
{{--                 stroke-linejoin="round" class="h-6 w-6 transform"--}}
{{--                 :class="isSidebarExpanded ? 'rotate-180' : 'rotate-0'">--}}
{{--                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>--}}
{{--                <line x1="4" y1="6" x2="14" y2="6"/>--}}
{{--                <line x1="4" y1="18" x2="14" y2="18"/>--}}
{{--                <path d="M4 12h17l-3 -3m0 6l3 -3"/>--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--        <span class="font-semibold text-2xl text-blue-500">{{ __('Admin Portal')  }}</span>--}}
{{--    </header>--}}
{{--    <div class="relative pr-12" x-data="{ isOpen: false }">--}}
{{--        <button--}}
{{--            @click="isOpen = !isOpen"--}}
{{--            class="inline-flex items-center gap-2 hover:text-gray-700"--}}
{{--        >--}}
{{--            <p>{{ Auth::user()->name }}</p>--}}
{{--            <img src="{{ asset('images/user.png') }}" alt="user_profile" class="w-8 h-8">--}}
{{--        </button>--}}

{{--        <div--}}
{{--            class="absolute end-0 z-10 mt-2 w-56 mr-5 rounded-md border border-gray-100 bg-white shadow-lg"--}}
{{--            role="menu"--}}
{{--            x-cloak--}}
{{--            x-transition--}}
{{--            x-show="isOpen"--}}
{{--            @click.away="isOpen = false"--}}
{{--            @keydown.escape.window="isOpen = false"--}}
{{--        >--}}
{{--            <div class="p-2 divide-y divide-dashed">--}}
{{--                <div--}}
{{--                    class="block rounded-lg px-4 py-2 mb-2 text-sm text-blue-500 hover:bg-gray-100 hover:text-yellow-500"--}}
{{--                    role="menuitem"--}}
{{--                >--}}
{{--                    <i class="fa-solid fa-at"></i>--}}
{{--                    <span class="break-words">{{ Auth::user()->email }}</span>--}}
{{--                </div>--}}

{{--                <div class="pt-2">--}}
{{--                    <form method="POST" action="{{ route('logout') }}"--}}
{{--                          class="cursor-pointer px-4 py-2 rounded-lg text-sm text-blue-500 hover:bg-gray-100 hover:text-yellow-500">--}}
{{--                        @csrf--}}

{{--                        <a href="{{route('logout')}}"--}}
{{--                           onclick="event.preventDefault();--}}
{{--                           this.closest('form').submit();"--}}
{{--                           class="inline-flex items-center gap-2"--}}
{{--                        >--}}
{{--                            <svg--}}
{{--                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                aria-hidden="true"--}}
{{--                                class="w-6 h-6"--}}
{{--                                width="24"--}}
{{--                                height="24"--}}
{{--                                viewBox="0 0 24 24"--}}
{{--                                stroke-width="2"--}}
{{--                                stroke="currentColor"--}}
{{--                                fill="none"--}}
{{--                                stroke-linecap="round"--}}
{{--                                stroke-linejoin="round"--}}
{{--                            >--}}
{{--                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>--}}
{{--                                <path--}}
{{--                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"--}}
{{--                                ></path>--}}
{{--                                <path d="M9 12h12l-3 -3"></path>--}}
{{--                                <path d="M18 15l3 -3"></path>--}}
{{--                            </svg>--}}
{{--                            {{ __('Log out') }}--}}
{{--                        </a>--}}
{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</div>--}}

