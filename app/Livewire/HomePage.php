<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class HomePage extends Component
{
    public function render()
    {
        // Ambil produk unggulan (contoh: 6 produk pertama)
        $featuredProducts = Product::take(6)->get();

        // Kirim data ke view + layout
        return view('livewire.home-page', [
            'featuredProducts' => $featuredProducts,
        ])->layout('components.layouts.app', [
            'title' => 'Beranda',
        ]);
    }
}
