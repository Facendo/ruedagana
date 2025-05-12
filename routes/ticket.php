<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;


Route::get('/tickets/{id_sorteo}', [TicketController::class, 'index'])->name('ticket.index');
Route::put('/tickets/bloquear/{id_sorteo}', [TicketController::class, 'bloquear'])->name('ticket.bloquear');
Route::put('/tickets/desbloquear/{id_sorteo}', [TicketController::class, 'desbloquear'])->name('ticket.desbloquear');
