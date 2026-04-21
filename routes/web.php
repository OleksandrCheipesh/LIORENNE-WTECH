<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;

Route::get('/', fn() => view('index'))->name('home');

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Shop categories
Route::get('/men', [ProductController::class, 'index'])->defaults('category', 'men')->name('men');
Route::get('/women', [ProductController::class, 'index'])->defaults('category', 'women')->name('women');
Route::get('/kids-baby', [ProductController::class, 'index'])->defaults('category', 'kids-baby')->name('kids-baby');
Route::get('/home-category', [ProductController::class, 'index'])->defaults('category', 'home')->name('home-category');
Route::get('/accessories', [ProductController::class, 'index'])->defaults('category', 'accessories')->name('accessories');
Route::get('/gifts', [ProductController::class, 'index'])->defaults('category', 'gifts')->name('gifts');

// Product detail
Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('product.detail');

// Shop pages
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'submit'])->name('checkout.submit');

// Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

// Admin
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminProductController::class, 'index'])->name('dashboard');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', fn() => view('admin.product-edit'))->name('products.edit');
});

Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';