<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::get('/reserva', [ReservaController::class, 'index'])->name('reserva');
Route::get('/reserva/lista', [ReservaController::class, 'lista'])->name('reserva.lista');
Route::get('/reserva/create/{room}', [ReservaController::class, 'create'])->name('reserva.create');
Route::post('/reserva/agregar', [ReservaController::class, 'store'])->name('reserva.store');
Route::post('/reserva/mostrar/{room}', [ReservaController::class, 'show'])->name('reserva.show');
Route::post('/reserva/editar/{id}', [ReservaController::class, 'edit'])->name('reserva.edit');
Route::post('/reserva/actualizar/{reserva}', [ReservaController::class, 'update'])->name('reserva.update');
Route::post('/reserva/borrar/{id}', [ReservaController::class, 'destroy'])->name('reserva.destroy');
Route::get('/reserva/pagar/{reserva}', [ReservaController::class, 'pagar'])->name('reserva.pagar');
Route::get('/reserva/agregarreserva', [ReservaController::class, 'agregarreserva'])->name('reserva.agregarreserva');
Route::put('/reserva/pagado/{reserva}', [ReservaController::class, 'pagado'])->name('reserva.pagado');

Route::get('/checkout', [CheckController::class, 'index'])->name('checkout');
Route::get('/checkout/pagar/{reserva}', [CheckController::class, 'pagar'])->name('checkout.pagar');







