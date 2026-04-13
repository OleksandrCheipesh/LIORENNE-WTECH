<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'))->name('home');

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Shop categories
Route::get('/men',         [ProductController::class, 'index'])->defaults('category', 'men')->name('men');
Route::get('/women',       [ProductController::class, 'index'])->defaults('category', 'women')->name('women');
Route::get('/kids-baby',   [ProductController::class, 'index'])->defaults('category', 'kids-baby')->name('kids-baby');
Route::get('/home-category',[ProductController::class, 'index'])->defaults('category', 'home')->name('home-category');
Route::get('/accessories', [ProductController::class, 'index'])->defaults('category', 'accessories')->name('accessories');
Route::get('/gifts',       [ProductController::class, 'index'])->defaults('category', 'gifts')->name('gifts');

// Shop pages
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/checkout', [CheckoutController::class, 'submit'])->name('checkout.submit');

// Admin
Route::get('/admin/login',              fn() => view('admin.login'))->name('admin.login');
Route::get('/admin/dashboard',          fn() => view('admin.dashboard'))->name('admin.dashboard');
Route::get('/admin/products/create',    fn() => view('admin.product-new'))->name('admin.products.create');
Route::get('/admin/products/{id}/edit', fn() => view('admin.product-edit'))->name('admin.products.edit');

Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';