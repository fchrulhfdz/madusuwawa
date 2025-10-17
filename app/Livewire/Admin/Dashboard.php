<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\Location;
use App\Models\Rating;
use App\Models\About;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // Statistik utama
        $stats = [
            'total_products'      => Product::count(),
            'active_products'     => Product::where('is_active', true)->count(),
            'total_locations'     => Location::count(),
            'total_ratings'       => Rating::count(),
            'approved_ratings'    => Rating::where('is_approved', true)->count(),
            'pending_ratings'     => Rating::where('is_approved', false)->count(),
            'total_about_sections'=> About::count(),
        ];

        // Data terbaru
        $recentProducts = Product::latest()->take(5)->get();
        $recentRatings  = Rating::with('product')->latest()->take(5)->get();

        // Return ke tampilan Livewire dengan layout admin
        return view('livewire.admin.dashboard', [
            'stats'           => $stats,
            'recentProducts'  => $recentProducts,
            'recentRatings'   => $recentRatings,
        ])->layout('components.layouts.admin', [
            'title'  => 'Dashboard Admin',
            'header' => 'Dashboard',
        ]);
    }
}
