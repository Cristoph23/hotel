<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/order', [OrderController::class, 'index'])->name('order');

Route::get('/order/buscar', [OrderController::class, 'buscar'])->name('order.buscar');
