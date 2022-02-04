<?php

use App\Http\Controllers\OrderproductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/product/dashboard', [ProductController::class, 'dashboard'])->name('product.dashboard');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');


Route::get('/orderproduct', [OrderproductController::class, 'index'])->name('orderproduct');
Route::get('/orderproduct/buscar', [OrderproductController::class, 'buscar'])->name('orderproduct.buscar');
Route::get('/orderproduct/buscador', [OrderproductController::class, 'buscador'])->name('orderproduct.buscador');
Route::put('/orderproduct/cobrar/{orderproduct}', [OrderproductController::class, 'cobrar'])->name('orderproduct.cobrar');
Route::post('/orderproduct/micarrito', [OrderproductController::class, 'agregarproduct'])->name('orderproduct.agregarproduct');
Route::get('/orderproduct/miorden/{reserva}/{orderproduct}', [OrderproductController::class, 'myorder'])->name('orderproduct.myorder');
Route::put('/orderproduct/editarcantidad/{orderproductdetail}', [OrderproductController::class, 'editarcantidad'])->name('orderproduct.editarcantidad');
Route::delete('/orderproduct/eliminar/{orderproductdetail}', [OrderproductController::class, 'eliminar'])->name('orderproduct.eliminar');
Route::delete('/orderproduct/limpiarcarrito', [OrderproductController::class, 'limpiarcarrito'])->name('orderproduct.limpiarcarrito');
Route::delete('/orderproduct/cancelar', [OrderproductController::class, 'cancelar'])->name('orderproduct.cancelar');


Route::get('/product/alertastock', [ProductController::class, 'stock'])->name('product.stock');
Route::get('/product/alertastock/agregar/{product}', [ProductController::class, 'agregarstock'])->name('product.agregarstock');

Route::get('/product/reportes', [ProductController::class, 'reportes'])->name('product.reporte');

Route::get('/product/ventas', [ProductController::class, 'ventas'])->name('product.venta');






