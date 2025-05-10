<?php

use App\Http\Controllers\PagoController;
use App\Http\Controllers\SorteoController;
use App\Models\Pago;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [PagoController::class, 'index'])->name('pago.index')->middleware('auth');
