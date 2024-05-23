<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackController;

// Ruta raíz que carga la vista 'welcome'.
Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard. Solo accesible para usuarios autenticados y verificados.
Route::get('/dashboard', [CuestionarioController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Agrupa rutas que requieren autenticación.
Route::middleware('auth')->group(function () {
    // Rutas para editar, actualizar y eliminar el perfil del usuario.
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta para acceder a la tienda.
    Route::get('/store', [StoreController::class, 'index'])->name('store');

    // Ruta para acceder a la colección del usuario.
    Route::get('/collection', [CollectionController::class, 'index'])->name('collection');

    // Ruta para mostrar un cuestionario específico por su ID.
    Route::get('/cuestionarios/{id}', [CuestionarioController::class, 'show'])->name('cuestionarios.show');

    // Ruta para obtener la siguiente pregunta de un cuestionario.
    Route::get('/cuestionarios/{cuestionarioId}/pregunta/{preguntaId}/siguiente', [CuestionarioController::class, 'siguientePregunta'])->name('cuestionario.siguientePregunta');

    // Ruta para actualizar los puntos del usuario. Requiere autenticación.
    Route::middleware('auth')->post('/update-points', [UserController::class, 'updatePoints'])->name('update.points');

    // Ruta para acceder a la tienda (duplicada, se podría remover una).
    Route::get('/store', [StoreController::class, 'index'])->name('store');

    // Ruta para comprar un cromo específico. Requiere autenticación.
    Route::middleware('auth')->post('/comprar-cromo/{cromo}', [StoreController::class, 'comprarCromo'])->name('comprar.cromo');

    // Ruta para comprar un pack. (API endpoint)
    Route::post('/api/buy-pack/{user}', [PackController::class, 'buyPack']);
});

// Incluye las rutas de autenticación generadas por Laravel.
require __DIR__.'/auth.php';
