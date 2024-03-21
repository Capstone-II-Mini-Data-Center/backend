

<aside class="flex flex-col min-h-screen text-blue-500 bg-gray-800 transition-all duration-300 ease-in-out"
       :class="isSidebarExpanded ? 'w-64' : 'w-20'">
    <a href="#"
       class="h-14 flex items-center px-4 bg-gray-800 border-b-2 border-dashed border-gray-600 overflow-hidden">
        <img src="{{ asset('images/logo.png') }}" class="flex-shrink-0 w-14 h-8" alt="cloudbloc logo"
             >
        <span class="ml-2 text-xl font-medium duration-300 ease-in-out"
              :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">CloudBloc</span>
    </a>
    <nav class="p-4 font-medium">
        <a href="{{ route('dashboard') }}"
           class="inline-flex items-center w-full px-3 h-10 transition duration-150 ease-in-out transform hover:border-l-4 hover:border-blue-500 hover:scale-95 text-white hover:bg-gray-900 {{ Route::is('dashboard') ? 'bg-gray-900 border-l-4 border-blue-500' : '' }}">
            <svg viewBox="0 0 32 32" class="w-6 h-6 flex-shrink-0" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <style>.cls-1 {
                            fill: none;
                            stroke: currentColor;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-width: 2px;
                        }</style>
                </defs>
                <title/>
                <g id="dashboard">
                    <line class="cls-1" x1="3" x2="29" y1="29" y2="29"/>
                    <line class="cls-1" x1="3" x2="3" y1="3" y2="29"/>
                    <line class="cls-1" x1="16" x2="16" y1="7" y2="25"/>
                    <line class="cls-1" x1="22" x2="22" y1="11" y2="25"/>
                    <line class="cls-1" x1="10" x2="10" y1="16" y2="25"/>
                </g>
            </svg>
            <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Dashboard</span>
        </a>
        <p class="mb-2 pt-4 pb-2 mx-2 border-b-2 border-gray-600 text-xs font-semibold text-gray-600 uppercase"
           :class="isSidebarExpanded ? 'opacity-100' : 'hidden'">
            Managements
        </p>
        <ul>
            <li class="py-2">
                <a href="{{ route('packages.index') }}"
                   class="inline-flex items-center w-full px-3 h-10 transition duration-150 ease-in-out transform hover:border-l-4 hover:border-blue-500 hover:scale-95 text-white hover:bg-gray-900 {{ Route::is('packages.*') ? 'bg-gray-900 border-l-4 border-blue-500' : '' }}">
                    <svg class="w-6 h-6 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                              d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                    </svg>
                    <span class="ml-2 duration-300 ease-in-out"
                          :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Packages</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('banners.index') }}"
                   class="inline-flex items-center w-full px-3 h-10 transition duration-150 ease-in-out transform hover:border-l-4 hover:border-blue-500 hover:scale-95 text-white hover:bg-gray-900 {{ Route::is('banners.*') ? 'bg-gray-900 border-l-4 border-blue-500' : '' }}">
                   <svg id="promo-promotion-discount-deal-percent-ribbon"
                          viewBox="0 0 15.118 15.107" fill="currentColor" class="flex-shrink-0 h-6 w-6"
                         xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink"><path
                            d="M14.059,5.436V3.245l-2.204-1.102L9.712,0L7.559,0.538L5.406,0L3.263,2.143L1.059,3.245v2.191L0,7.554l1.059,2.118v2.191  l2.204,1.102l2.143,2.143l2.153-0.538l2.153,0.538l2.143-2.143l2.204-1.102V9.672l1.059-2.118L14.059,5.436z M13.059,9.436v1.809  l-1.724,0.862L9.406,14l-1.847-0.462L5.712,14l-1.8-1.8l-1.854-0.956V9.436L1.118,7.554l0.941-1.882V3.863l1.724-0.862l1.93-1.894  l1.847,0.462l1.847-0.462l1.8,1.8l1.854,0.956v1.809L14,7.554L13.059,9.436z"/>
                        <rect height="1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.1273 7.5575)" width="8.485"
                              x="3.316" y="7.054"/>
                        <path
                            d="M5.559,7.054c0.827,0,1.5-0.673,1.5-1.5s-0.673-1.5-1.5-1.5s-1.5,0.673-1.5,1.5S4.732,7.054,5.559,7.054z M5.559,5.054  c0.276,0,0.5,0.224,0.5,0.5s-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5S5.283,5.054,5.559,5.054z"/>
                        <path
                            d="M9.559,8.054c-0.827,0-1.5,0.673-1.5,1.5s0.673,1.5,1.5,1.5s1.5-0.673,1.5-1.5S10.386,8.054,9.559,8.054z M9.559,10.054  c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5S9.835,10.054,9.559,10.054z"/></svg>
                    <span class="ml-2 duration-300 ease-in-out"
                          :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Banners</span>
                </a>
            </li>
        </ul>
        <p class="mb-2 pt-4 pb-2 mx-2 border-b-2 border-gray-600 text-xs font-semibold text-gray-600 uppercase"
           :class="isSidebarExpanded ? 'opacity-100' : 'hidden'">
            Listings
        </p>
        <ul>
            <li class="py-2">
                <a href="{{ route('users.index') }}"
                   class="inline-flex items-center w-full px-3 h-10 transition duration-150 ease-in-out transform hover:border-l-4 hover:border-blue-500 hover:scale-95 text-white hover:bg-gray-900 {{ Route::is('users.*') ? 'bg-gray-900 border-l-4 border-blue-500' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         class="flex-shrink-0" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6C17 8.76142 14.7614 11 12 11C9.23858 11 7 8.76142 7 6ZM12 3C10.3431 3 9 4.34315 9 6C9 7.65685 10.3431 9 12 9C13.6569 9 15 7.65685 15 6C15 4.34315 13.6569 3 12 3Z"
                              fill="currentColor"/>
                        <path
                            d="M4.06189 21C4.55399 17.0537 7.92038 14 12 14C12.9596 14 13.8776 14.1685 14.7274 14.4767L15.6675 14.8176L16.3493 12.9374L15.4092 12.5965C14.344 12.2102 13.1954 12 12 12C6.47715 12 2 16.4772 2 22V23H17V21H4.06189Z"
                            fill="currentColor"/>
                        <path
                            d="M19.9673 16C19.5027 16 19.1098 16.3177 18.9987 16.7493L18.7495 17.7177L16.8126 17.2192L17.0618 16.2507C17.3948 14.957 18.568 14 19.9673 14C21.6241 14 22.9673 15.3431 22.9673 17C22.9673 17.9314 22.5128 18.5493 22.0367 19.0087C21.8439 19.1949 21.6243 19.3769 21.4269 19.5405C21.3978 19.5646 21.3691 19.5883 21.3412 19.6116C21.1107 19.8033 20.8902 19.9913 20.6744 20.2071L19.9673 20.9142L18.5531 19.5L19.2602 18.7929C19.5443 18.5087 19.8238 18.2723 20.0622 18.074C20.0937 18.0478 20.1242 18.0225 20.1537 17.998C20.3582 17.8282 20.5134 17.6994 20.6478 17.5697C20.9218 17.3053 20.9673 17.1732 20.9673 17C20.9673 16.4477 20.5195 16 19.9673 16Z"
                            fill="currentColor"/>
                        <path d="M18.9668 21H20.9768V23H18.9668V21Z" fill="currentColor"/>
                    </svg>
                    <span class="ml-2 duration-300 ease-in-out"
                          :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Users</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('orders.index') }}"
                   class="inline-flex items-center w-full px-3 h-10 transition duration-150 ease-in-out transform hover:border-l-4 hover:border-blue-500 hover:scale-95 text-white hover:bg-gray-900 {{ Route::is('orders.*') ? 'bg-gray-900 border-l-4 border-blue-500' : '' }}">
                    <svg fill="currentColor " class="h-6 w-6 flex-shrink-0" viewBox="0 0 128 128"
                         xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink"><g>
                            <path
                                d="M96,0.6l-10,10l-10-10l-10,10l-10-10l-10,10l-10-10l-10,10l-10-10L2.2,14.4V108c0,10.4,8.5,18.8,18.8,18.8h93   c6.5,0,11.8-5.3,11.8-11.8V39h-7.7v76c0,2.3-1.9,4.2-4.2,4.2s-4.2-1.9-4.2-4.2V14.4L96,0.6z M21,119.2c-6.2,0-11.2-5-11.2-11.2   V17.6l6.2-6.2l10,10l10-10l10,10l10-10l10,10l10-10l10,10l10-10l6.2,6.2V115c0,1.5,0.3,2.9,0.8,4.2H21z"/>
                            <path
                                d="M60,32h-8v10.8L51.4,43c-5.7,2.3-9.4,7.7-9.4,13.8c0,4.5,2,8.7,5.6,11.6l11.9,9.5c1.6,1.3,2.6,3.2,2.6,5.3   c0,3.8-3.1,6.8-6.8,6.8H42v8h10v10h8V97.2l0.6-0.3c5.7-2.3,9.4-7.7,9.4-13.8c0-4.5-2-8.7-5.6-11.6l-11.9-9.5   c-1.6-1.3-2.6-3.2-2.6-5.3c0-3.8,3.1-6.8,6.8-6.8H70v-8H60V32z"/>
                        </g></svg>
                    <span class="ml-2 duration-300 ease-in-out"
                          :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Orders</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('reports.index') }}"
                   class="inline-flex items-center w-full px-3 h-10 transition duration-150 ease-in-out transform hover:border-l-4 hover:border-blue-500 hover:scale-95 text-white hover:bg-gray-900 {{ Route::is('reports.*') ? 'bg-gray-900 border-l-4 border-blue-500' : '' }}">
                    <svg viewBox="0 0 544 512" fill="currentColor" class="flex-shrink-0 h-6 w-6"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"/>
                    </svg>
                    <span class="ml-2 duration-300 ease-in-out"
                          :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Reports</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

