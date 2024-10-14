<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::resource('laboratorios', App\Http\Controllers\LaboratoriosController::class);
Route::resource('medicamentos', App\Http\Controllers\MedicamentosController::class);