<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Katalog Modern' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
    @livewireStyles
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">KM</span>
                        </div>
                        <span class="ml-3 text-2xl font-bold text-gray-800">Katalog Modern</span>
                    </a>
                </div>

                <!-- Navigation Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium transition {{ request()->is('/') ? 'text-blue-600 font-semibold' : '' }}">
                        Home
                    </a>
                    <a href="/products" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium transition {{ request()->is('products*') ? 'text-blue-600 font-semibold' : '' }}">
                        Product
                    </a>
                    <a href="/locations" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium transition {{ request()->is('locations*') ? 'text-blue-600 font-semibold' : '' }}">
                        Location
                    </a>
                    <a href="/ratings" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium transition {{ request()->is('ratings*') ? 'text-blue-600 font-semibold' : '' }}">
                        Rating
                    </a>
                    <a href="/about" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium transition {{ request()->is('about*') ? 'text-blue-600 font-semibold' : '' }}">
                        About
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="text-gray-700 hover:text-blue-600" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Home</a>
                <a href="/products" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Product</a>
                <a href="/locations" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Location</a>
                <a href="/ratings" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Rating</a>
                <a href="/about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">About</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Katalog Modern</h3>
                    <p class="text-gray-400">Platform katalog produk terpercaya dengan berbagai pilihan.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Menu</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="/" class="hover:text-white">Home</a></li>
                        <li><a href="/products" class="hover:text-white">Product</a></li>
                        <li><a href="/locations" class="hover:text-white">Location</a></li>
                        <li><a href="/about" class="hover:text-white">About</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <p class="text-gray-400">Email: info@katalogmodern.com</p>
                    <p class="text-gray-400">Telepon: +62 123 4567 890</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Katalog Modern. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    @livewireScripts
</body>
</html>