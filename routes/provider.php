<?php

use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;

Route::get('/provider', [ProviderController::class, 'index'])->name('provider');

Route::get('/provider/create', [ProviderController::class, 'create'])->name('provider.create');

Route::post('/provider/store', [ProviderController::class, 'store'])->name('provider.store');

Route::delete('/provider/delete/{provider}', [ProviderController::class, 'destroy'])->name('provider.delete');



