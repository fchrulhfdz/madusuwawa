<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Selamat Datang di Katalog Modern</h1>
        <p class="text-lg text-gray-600">Temukan berbagai produk unggulan pilihan kami.</p>
    </div>

    <!-- Featured Products -->
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Produk Unggulan</h2>

    @if(isset($featuredProducts) && $featuredProducts->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($featuredProducts as $product)
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300x200?text=Product' }}" alt="{{ $product->name }}" class="rounded-md mb-4 w-full h-48 object-cover">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-2">{{ Str::limit($product->description, 60) }}</p>
                    <p class="text-blue-600 font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Belum ada produk unggulan yang tersedia.</p>
    @endif
</div>
