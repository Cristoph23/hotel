<?php

use App\Http\Controllers\TyperoomController;
use Illuminate\Support\Facades\Route;

Route::get('/tipohabitacion', [TyperoomController::class, 'index'])->name('tipohabitacion');

Route::post('/tipohabitacion/store', [TyperoomController::class, 'store'])->name('tipohabitacion.store');

Route::delete('/tipohabitacion/destroy/{typeroom}', [TyperoomController::class, 'destroy'])->name('tipohabitacion.destroy');



