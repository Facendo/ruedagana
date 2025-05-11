<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;


Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.index');