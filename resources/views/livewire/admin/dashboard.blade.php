<div>
    <h1 class="text-2xl font-bold mb-1">Dashboard</h1>
    <p class="text-gray-500 mb-6">Welcome back! Here's what's happening today.</p>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-5 rounded-xl shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500 text-sm">Total Products</h3>
                <i class="ri-box-3-line text-blue-500 text-xl"></i>
            </div>
            <p class="text-2xl font-bold mt-2">{{ $stats['total_products'] }}</p>
            <p class="text-green-500 text-sm mt-1">+12% from last month</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500 text-sm">Total Locations</h3>
                <i class="ri-map-pin-line text-indigo-500 text-xl"></i>
            </div>
            <p class="text-2xl font-bold mt-2">{{ $stats['total_locations'] }}</p>
            <p class="text-green-500 text-sm mt-1">+8% from last month</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500 text-sm">Approved Ratings</h3>
                <i class="ri-star-line text-yellow-500 text-xl"></i>
            </div>
            <p class="text-2xl font-bold mt-2">{{ $stats['approved_ratings'] }}</p>
            <p class="text-green-500 text-sm mt-1">+23% from last month</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500 text-sm">About Sections</h3>
                <i class="ri-information-line text-purple-500 text-xl"></i>
            </div>
            <p class="text-2xl font-bold mt-2">{{ $stats['total_about_sections'] }}</p>
            <p class="text-red-500 text-sm mt-1">-5% from last month</p>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="flex justify-between items-center p-4 border-b">
            <div>
                <h3 class="font-semibold text-lg">Product Management</h3>
                <p class="text-gray-500 text-sm">Create, read, update, and delete products</p>
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">
                + Add New
            </button>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($recentProducts as $product)
                    <tr>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->category ?? '-' }}</td>
                        <td class="px-6 py-4">${{ $product->price }}</td>
                        <td class="px-6 py-4">{{ $product->stock }}</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-blue-500 hover:text-blue-700"><i class="ri-edit-2-line"></i></button>
                            <button class="text-red-500 hover:text-red-700 ml-2"><i class="ri-delete-bin-line"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
