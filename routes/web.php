<?php

use App\Http\Controllers\Admin\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JuegoController;
use App\Http\Controllers\Admin\ComentarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JuegoPublicController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// =======================
// JUEGOS PÚBLICOS
// =======================

Route::get('/juegos/{juego}', [JuegoPublicController::class, 'show'])
    ->name('juegos.show');

// =======================
// AUTH PROTEGIDO (USUARIO LOGUEADO)
// =======================

Route::middleware('auth')->group(function () {

    Route::post('/juegos/{juego}/comentario', [JuegoPublicController::class, 'comentario'])
        ->name('juegos.comentario');

    Route::post('/juegos/{juego}/rating', [JuegoPublicController::class, 'rating'])
        ->name('juegos.rating');

    // ELIMINAR COMENTARIO (desde juego)
    Route::delete('/juegos/{juego}/comentarios/{comentario}', [JuegoPublicController::class, 'destroyComentario'])
        ->name('juegos.comentario.destroy');

    // =======================
    // PERFIL
    // =======================

    Route::get('/perfil', [ProfileController::class, 'index'])
        ->name('perfil');

    // ELIMINAR COMENTARIO (desde perfil)
    Route::delete('/perfil/comentarios/{comentario}', [ProfileController::class, 'destroyComentario'])
        ->name('perfil.comentario.destroy');
});

// =======================
// AUTH
// =======================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

// ======================
// ADMIN
// ======================

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('juegos', JuegoController::class);

        Route::get('/comentarios', [ComentarioController::class, 'index'])
            ->name('admin.comentarios.index');

        Route::delete('/comentarios/{comentario}', [ComentarioController::class, 'destroy'])
            ->name('admin.comentarios.destroy');

        Route::resource('usuarios', UsuarioController::class);
    });