<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::get('/', [HotelController::class, 'index']);

Route::post('/reserva', [HotelController::class, 'crearReserva'])
        ->name('reserva.store');