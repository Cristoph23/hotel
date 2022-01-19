<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/habitacion', [RoomController::class, 'index'])->name('habitacion');

Route::get('/habitacion/create', [RoomController::class, 'create'])->name('habitacion.create');

Route::post('/habitacion/store', [RoomController::class, 'store'])->name('habitacion.store');

Route::get('/habitacion/edit/{room}', [RoomController::class, 'edit'])->name('habitacion.edit');

Route::put('/habitacion/update/{room}', [RoomController::class, 'update'])->name('habitacion.update');

Route::delete('/habitacion/destroy/{room}', [RoomController::class, 'destroy'])->name('habitacion.destroy');


