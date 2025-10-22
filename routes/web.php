<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Language switcher
Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/shop', \App\Livewire\Shop::class)->name('shop');
Route::get('/shop/{id}', \App\Livewire\ShopDetail::class)->name('shop.show');

// Admin Routes (requires authentication AND admin role)
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/products', \App\Livewire\ProductManager::class)->name('products');
    Route::get('/products/{id}', \App\Livewire\ProductDetail::class)->name('products.show');

    Route::get('/database', \App\Livewire\DatabaseManager::class)->name('database');
});

// Authenticated User Routes (profile management)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
