<?php

use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::get('/reserva', [ReservaController::class, 'index'])->name('reserva');

Route::get('/reserva/create/{room}', [ReservaController::class, 'create'])->name('reserva.create');

Route::post('/reserva/agregar', [ReservaController::class, 'store'])->name('reserva.store');

Route::post('/reserva/mostrar/{room}', [ReservaController::class, 'show'])->name('reserva.show');


