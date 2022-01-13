<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/configuraciones', [HomeController::class, 'configuraciones'])->name('configuraciones');
Route::get('/configuraciones/iva', [HomeController::class, 'iva'])->name('configuraciones.iva');
Route::post('/configuraciones/iva/crear', [HomeController::class, 'agregariva'])->name('configuraciones.agregariva');
Route::put('/configuraciones/iva/editariva/{impuesto}', [HomeController::class, 'editariva'])->name('configuraciones.editariva');
Route::delete('/configuraciones/iva/eliminariva/{impuesto}', [HomeController::class, 'eliminariva'])->name('configuraciones.eliminariva');

Auth::routes();
