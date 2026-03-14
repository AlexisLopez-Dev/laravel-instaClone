<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

// Rutas para la gestión de fotos
Route::get('/fotos', [FotoController::class, 'index'])->name('fotos.index');

Route::middleware('auth')->group(function (){

    Route::get('/fotos/create', [FotoController::class, 'create'])->name('fotos.create');
    Route::post('/fotos/store', [FotoController::class, 'store'])->name('fotos.store');

    Route::get('/fotos/{foto}/edit', [FotoController::class, 'edit'])->name('fotos.edit')->middleware('can:update,foto');
    Route::put('/fotos/{foto}/update', [FotoController::class, 'update'])->name('fotos.update')->middleware('can:update,foto');


    Route::delete('/fotos/{foto}', [FotoController::class, 'destroy'])->name('fotos.destroy')->middleware('can:delete,foto');

    Route::post('/fotos/{foto}/like', [FotoController::class, 'darLike'])->name('fotos.like');
});

Route::get('/fotos/{foto}', [FotoController::class, 'show'])->name('fotos.show');



// --- RUTAS DE REGISTRO ---
Route::view('/registro', 'auth.registro')->name('registro.form');
Route::post('/registro', [RegisterController::class, 'store'])->name('registro.store');

// --- RUTAS DE LOGIN ---
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [SessionController::class, 'authenticate'])->name('login.post');

// --- RUTA DE LOGOUT ---
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');



Route::fallback(function () {
    return redirect()->route('fotos.index');
});
