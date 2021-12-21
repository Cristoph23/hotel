<?php

use App\Http\Controllers\DatatableController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/users', [UserController::class, 'index'])->name('usuarios');

Route::get('/users/create', [UserController::class, 'create'])->name('usuarios.create');

Route::post('/users/store', [UserController::class, 'store'])->name('usuarios.store');

Route::get('/roles', [RoleController::class, 'index'])->name('roles');

Route::get('/roles/asignar/{user}', [RoleController::class, 'edit'])->name('roles.asignar');

Route::put('roles/asignar/{user}', [RoleController::class, 'update'])->name('roles.asignar.update');

// Route::get('/role/datatable', [DatatableController::class, 'roles'])->name('roles.datatable');

