<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;


Route::get('/tickets/{id_pago}', [TicketController::class, 'index'])->name('ticket.index');
Route::post('/ticket',[TicketController::class, 'store'])->name('ticket.store');
Route::put('/tickets/bloquear/{sorteo}', [TicketController::class, 'bloquear'])->name('ticket.bloquear');
Route::put('/tickets/desbloquear/{sorteo}', [TicketController::class, 'desbloquear'])->name('ticket.desbloquear');
