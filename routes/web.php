<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontend.index');
Route::get('/shop', [App\Http\Controllers\ProductController::class, 'products'])->name('frontend.shop');
Route::get('/contact', [App\Http\Controllers\FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/shop/product-details/{slug}', [App\Http\Controllers\ProductController::class, 'productDetails'])->name('frontend.product-details');
Route::get('/shop/cart', [App\Http\Controllers\FrontendController::class, 'cart'])->name('frontend.cart');
Route::get('/shop/checkout', [App\Http\Controllers\FrontendController::class, 'checkout'])->name('frontend.checkout');

Route::post('/checkout/store', [App\Http\Controllers\OrderController::class, 'store'])->name('frontend.checkout.store');
    
Auth::routes();
Route::get('/user/dashboard', [App\Http\Controllers\BuyerController::class, 'dashboard'])->name('buyer.dashboard');
Route::get('/user/orders', [App\Http\Controllers\BuyerController::class, 'orders'])->name('buyer.orders.index');


Route::fallback([App\Http\Controllers\FrontendController::class, 'defaultError'])->name('frontend.defaultError');