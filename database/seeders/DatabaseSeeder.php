<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Location;
use App\Models\Rating;
use App\Models\About;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Products
        Product::create([
            'name' => 'Laptop Gaming ROG',
            'description' => 'Laptop gaming dengan spesifikasi tinggi untuk gaming dan desain',
            'price' => 25000000,
            'category' => 'Electronics',
            'stock' => 10,
            'is_active' => true
        ]);

        Product::create([
            'name' => 'iPhone 15 Pro Max',
            'description' => 'Smartphone flagship dari Apple dengan fitur terbaru',
            'price' => 20000000,
            'category' => 'Smartphones',
            'stock' => 15,
            'is_active' => true
        ]);

        // Locations
        Location::create([
            'name' => 'Toko Pusat Jakarta',
            'address' => 'Jl. Sudirman No. 123, Jakarta Pusat',
            'phone' => '021-1234567',
            'email' => 'jakarta@katalogmodern.com',
            'city' => 'Jakarta',
            'opening_hours' => 'Senin - Sabtu: 09:00 - 21:00',
            'is_active' => true
        ]);

        // About
        About::create([
            'title' => 'Tentang Kami',
            'content' => 'Katalog Modern adalah platform e-commerce terpercaya yang menyediakan berbagai produk berkualitas.',
            'section' => 'company',
            'order' => 1,
            'is_active' => true
        ]);

        // Ratings
        Rating::create([
            'customer_name' => 'Budi Santoso',
            'customer_email' => 'budi@example.com',
            'rating' => 5,
            'review' => 'Produk sangat berkualitas dan pengiriman cepat!',
            'product_id' => 1,
            'is_approved' => true
        ]);
    }
}