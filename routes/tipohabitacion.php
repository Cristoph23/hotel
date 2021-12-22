<?php

use App\Http\Controllers\TyperoomController;
use Illuminate\Support\Facades\Route;

Route::get('/tipohabitacion', [TyperoomController::class, 'index'])->name('tipohabitacion');

Route::get('/tipohabitacion/create', [TyperoomController::class, 'create'])->name('tipohabitacion.create');

Route::post('/tipohabitacion/store', [TyperoomController::class, 'store'])->name('tipohabitacion.store');


