<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans text-gray-800">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r shadow-sm">
        <div class="flex items-center h-16 border-b px-6">
            <div class="w-8 h-8 bg-blue-600 text-white flex items-center justify-center rounded-lg font-bold">A</div>
            <span class="ml-3 font-bold text-lg text-gray-700">AdminPro</span>
        </div>

        <nav class="mt-6 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 hover:bg-blue-50 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-600' }}">
                <i class="ri-dashboard-line mr-3 text-lg"></i> Dashboard
            </a>
            <a href="{{ route('admin.products') }}" class="flex items-center px-6 py-3 hover:bg-blue-50 {{ request()->routeIs('admin.products') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-600' }}">
                <i class="ri-shopping-cart-2-line mr-3 text-lg"></i> Products
            </a>
            <a href="{{ route('admin.locations') }}" class="flex items-center px-6 py-3 hover:bg-blue-50 {{ request()->routeIs('admin.locations') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-600' }}">
                <i class="ri-map-pin-line mr-3 text-lg"></i> Locations
            </a>
            <a href="{{ route('admin.ratings') }}" class="flex items-center px-6 py-3 hover:bg-blue-50 {{ request()->routeIs('admin.ratings') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-600' }}">
                <i class="ri-star-line mr-3 text-lg"></i> Ratings
            </a>
            <a href="{{ route('admin.about') }}" class="flex items-center px-6 py-3 hover:bg-blue-50 {{ request()->routeIs('admin.about') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-600' }}">
                <i class="ri-information-line mr-3 text-lg"></i> About
            </a>
        </nav>

        <div class="absolute bottom-0 left-0 w-full border-t p-4">
            <a href="/" class="flex items-center text-red-600 hover:text-red-700">
                <i class="ri-logout-circle-line mr-2"></i> Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 border-b">
            <div class="flex items-center space-x-4">
                <input type="text" placeholder="Search..." class="px-4 py-2 border rounded-lg text-sm w-64 focus:ring focus:ring-blue-200 focus:outline-none">
            </div>
            <div class="flex items-center space-x-4">
                <button class="relative">
                    <i class="ri-notification-3-line text-xl text-gray-600"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1">3</span>
                </button>
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">JD</div>
                    <div>
                        <p class="text-sm font-medium">John Doe</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6">
            {{ $slot }}
        </main>
    </div>
</div>

@livewireScripts
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet">
</body>
</html>
