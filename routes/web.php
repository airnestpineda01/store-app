<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'customerLogin'])->name('customer.login');
Route::post('/login', [HomeController::class, 'customerAuthenticate'])->name('customer.authenticate');
Route::get('/register', [HomeController::class, 'customerRegister'])->name('customer.register');
Route::post('/register', [HomeController::class, 'customerStore'])->name('customer.store');
Route::post('/logout', [HomeController::class, 'customerLogout'])->name('customer.logout');
Route::get('/admin/login', [HomeController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/register', [HomeController::class, 'adminRegister'])->name('admin.register');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [HomeController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [HomeController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::post('/checkout/complete', [HomeController::class, 'completeCheckout'])->name('checkout.complete');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard/account', [HomeController::class, 'updateDashboardAccount'])->name('dashboard.account.update');
Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/products', [HomeController::class, 'adminProducts'])->name('admin.products.index');
Route::get('/admin/products/create', [HomeController::class, 'createAdminProduct'])->name('admin.products.create');
Route::post('/admin/orders/status', [HomeController::class, 'updateAdminOrderStatus'])->name('admin.orders.status.update');
Route::post('/admin/products', [HomeController::class, 'storeAdminProduct'])->name('admin.products.store');
Route::get('/admin/products/{slug}/edit', [HomeController::class, 'editAdminProduct'])->name('admin.products.edit');
Route::post('/admin/products/{slug}', [HomeController::class, 'updateAdminProduct'])->name('admin.products.update');
Route::delete('/admin/products/{slug}', [HomeController::class, 'deleteAdminProduct'])->name('admin.products.delete');
Route::get('/order-success', [HomeController::class, 'orderSuccess'])->name('order.success');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop/{slug}', [HomeController::class, 'product'])->name('product.show');
Route::post('/generate', [HomeController::class, 'generate'])->name('generate');
