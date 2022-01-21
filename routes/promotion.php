<?php

use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

Route::get('/promotion', [PromotionController::class, 'index'])->name('promotion');