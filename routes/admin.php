<?php

use App\Http\Controllers\PagoController;
use App\Http\Controllers\SorteoController;
use App\Http\Controllers\TicketController;
use App\Models\Pago;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [PagoController::class, 'index'])->name('pago.index');
Route::delete('/admin/{pago}', [PagoController::class, 'destroy'])->name('pago.destroy');
Route::post('/admin/{id_sorteo}/{cedula}', [TicketController::class, 'store'])->name('ticket.store');