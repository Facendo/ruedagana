<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::post('/compra',[ClienteController::class, 'store'])->name('cliente.store');