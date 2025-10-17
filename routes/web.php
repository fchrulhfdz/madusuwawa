<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\ProductPage;
use App\Livewire\LocationPage;
use App\Livewire\RatingPage;
use App\Livewire\AboutPage;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\ProductManagement;
use App\Livewire\Admin\LocationManagement;
use App\Livewire\Admin\RatingManagement;
use App\Livewire\Admin\AboutManagement;

// User Routes
Route::get('/', HomePage::class)->name('home');
Route::get('/products', ProductPage::class)->name('products');
Route::get('/locations', LocationPage::class)->name('locations');
Route::get('/ratings', RatingPage::class)->name('ratings');
Route::get('/about', AboutPage::class)->name('about');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/products', ProductManagement::class)->name('admin.products');
    Route::get('/locations', LocationManagement::class)->name('admin.locations');
    Route::get('/ratings', RatingManagement::class)->name('admin.ratings');
    Route::get('/about', AboutManagement::class)->name('admin.about');
});