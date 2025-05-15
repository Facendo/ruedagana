<?php

use App\Http\Controllers\PagoController;
use App\Http\Controllers\SorteoController;
use App\Http\Controllers\TicketController;
use App\Models\Pago;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [PagoController::class, 'index'])->name('pago.index');
Route::delete('/admin/{id_pago}', [PagoController::class, 'destroy'])->name('pago.destroy');
Route::get('/tickets/show', [TicketController::class, 'show'])->name('admin.showticket');
