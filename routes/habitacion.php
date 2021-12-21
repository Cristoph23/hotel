<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/habitacion', [RoomController::class, 'index'])->name('habitacion');
