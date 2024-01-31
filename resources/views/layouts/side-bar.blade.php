
<!-- resources/views/layouts/sidebar.blade.php -->

<div class="bg-white text-blue-500 shadow-md h-screen w-1/5 fixed left-0">
    <!-- Sidebar content -->
    <div class="p-4">
        <!-- Your sidebar content goes here -->
        <a href="#" class="block py-2 px-4 rounded {{ request()->is('dashboard') ? 'bg-blue-200' : '' }}">
            Dashboard
        </a>
        <a href="{{ route('manage_package.index') }}" class="block py-2 px-4 rounded mt-2 {{ request()->routeIs('manage_package.*') ? 'bg-blue-200' : '' }}">
            Manage Package
        </a>
        <a href="{{ route('manage_banner.index') }}" class="block py-2 px-4 rounded mt-2 {{ request()->routeIs('manage_banner.*') ? 'bg-blue-200' : '' }}">
            Manage Banner
        </a>
    </div>
</div>

