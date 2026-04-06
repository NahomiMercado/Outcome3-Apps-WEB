<?php

use App\Http\Controllers\ArchivedOrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/track', [HomeController::class, 'track'])->name('track');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('orders', OrderController::class);

    Route::patch('/orders/{order}/status', [OrderController::class, 'changeStatus'])->name('orders.changeStatus');
    Route::post('/orders/{order}/photos', [OrderController::class, 'uploadPhoto'])->name('orders.uploadPhoto');

    Route::get('/archived-orders', [ArchivedOrderController::class, 'index'])->name('archived-orders.index');
    Route::patch('/archived-orders/{id}/restore', [ArchivedOrderController::class, 'restore'])->name('archived-orders.restore');
});

require __DIR__.'/auth.php';
