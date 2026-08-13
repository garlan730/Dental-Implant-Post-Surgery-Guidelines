<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AppointmentController;

Route::get('/appointment', [AppointmentController::class, 'create'])
    ->name('appointment.create');

Route::post('/appointment', [AppointmentController::class, 'store'])
    ->name('appointment.store');

Route::get('/appointments', [AppointmentController::class, 'index'])
    ->name('appointment.index');

Route::delete('/appointment/{id}', [AppointmentController::class, 'destroy'])
    ->name('appointment.destroy');
