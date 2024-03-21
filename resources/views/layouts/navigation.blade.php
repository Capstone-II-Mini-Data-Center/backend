
<div class="h-14 flex items-center justify-between bg-white border-b border-gray-200">
    <header class="flex items-center px-6 bg-white">
        <button class="p-2 -ml-2 mr-2" @click="isSidebarExpanded = !isSidebarExpanded">
            <svg viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                 stroke-linejoin="round" class="h-6 w-6 transform"
                 :class="isSidebarExpanded ? 'rotate-180' : 'rotate-0'">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="4" y1="6" x2="14" y2="6"/>
                <line x1="4" y1="18" x2="14" y2="18"/>
                <path d="M4 12h17l-3 -3m0 6l3 -3"/>
            </svg>
        </button>
        <span class="font-semibold text-2xl text-blue-500">{{ __('Admin Portal')  }}</span>
    </header>
    <div class="relative pr-12" x-data="{ isOpen: false }">
        <button
            @click="isOpen = !isOpen"
            class="inline-flex items-center gap-2 hover:text-gray-700"
        >
            <p>{{ Auth::user()->name }}</p>
            <img src="{{ asset('images/user.png') }}" alt="user_profile" class="w-8 h-8">
        </button>

        <div
            class="absolute end-0 z-10 mt-2 w-56 mr-5 rounded-md border border-gray-100 bg-white shadow-lg"
            role="menu"
            x-cloak
            x-transition
            x-show="isOpen"
            @click.away="isOpen = false"
            @keydown.escape.window="isOpen = false"
        >
            <div class="p-2 divide-y divide-dashed">
                <div
                    class="block rounded-lg px-4 py-2 mb-2 text-sm text-blue-500 hover:bg-gray-100 hover:text-yellow-500"
                    role="menuitem"
                >
                    <i class="fa-solid fa-at"></i>
                    <span class="break-words">{{ Auth::user()->email }}</span>
                </div>

                <div class="pt-2">
                    <form method="POST" action="{{ route('logout') }}"
                          class="cursor-pointer px-4 py-2 rounded-lg text-sm text-blue-500 hover:bg-gray-100 hover:text-yellow-500">
                        @csrf

                        <a href="{{route('logout')}}"
                           onclick="event.preventDefault();
                           this.closest('form').submit();"
                           class="inline-flex items-center gap-2"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                class="w-6 h-6"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"
                                ></path>
                                <path d="M9 12h12l-3 -3"></path>
                                <path d="M18 15l3 -3"></path>
                            </svg>
                            {{ __('Log out') }}
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

