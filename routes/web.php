<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;

// Rutas para la gestión de fotos
Route::get('/fotos', [FotoController::class, 'index'])->name('fotos.index');

Route::get('/fotos/create', [FotoController::class, 'create'])->name('fotos.create');

Route::post('/fotos/store', [FotoController::class, 'store'])->name('fotos.store');
