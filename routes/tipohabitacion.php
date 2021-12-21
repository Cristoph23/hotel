<?php

use App\Http\Controllers\TyperoomController;
use Illuminate\Support\Facades\Route;

Route::get('/tipohabitacion', [TyperoomController::class, 'index'])->name('tipohabitacion');
