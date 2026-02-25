<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

// Rutas para la gestión de fotos
Route::get('/fotos', [FotoController::class, 'index'])->name('fotos.index')->middleware('auth');

Route::get('/fotos/create', [FotoController::class, 'create'])->name('fotos.create');

Route::post('/fotos/store', [FotoController::class, 'store'])->name('fotos.store');

Route::post('/fotos/{foto}/like', [FotoController::class, 'darLike'])->name('fotos.like');




// --- RUTAS DE REGISTRO ---
// Muestra el formulario HTML
Route::view('/registro', 'auth.registro')->name('registro.form');
// Procesa los datos del formulario
Route::post('/registro', [RegisterController::class, 'store'])->name('registro.store');

// --- RUTAS DE LOGIN (SESIÓN) ---
// El nombre 'login' es OBLIGATORIO porque Laravel te redirige aquí si intentas entrar a una ruta protegida
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [SessionController::class, 'authenticate'])->name('login.post');

// --- RUTA DE LOGOUT ---
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
