<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Agricultor\ProductoController;
use App\Http\Controllers\Agricultor\PedidoController;
use App\Http\Controllers\Agricultor\PostulacionTransportistaController;
use App\Http\Controllers\Agricultor\PerfilController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Publico\CatalogoPublicoController;



// Página principal
Route::get('/', function () {
    return view('welcome');
});

// Redirección por rol después del login
Route::get('/dashboard', function () {
    $user = Auth::user();

    return match ($user->role) {
        'agricultor' => redirect()->route('agricultor.dashboard'),
        'comprador' => redirect()->route('comprador.dashboard'),
        'transportista' => redirect()->route('transportista.dashboard'),
        default => abort(403, 'Rol no reconocido'),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas del perfil global (usado por Breeze)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Middleware para usuarios autenticados, verificados y con perfil completo
Route::middleware(['auth', 'verified'])->group(function () {
    // 🌾 Ruta de redirección para el dashboard del agricultor (vista: agricultor/dashboard.blade.php)
    // 🌾 Dashboard del Agricultor
    Route::get('/dashboard-agricultor', [ProductoController::class, 'index'])->name('agricultor.dashboard');

    // 📦 Productos del Agricultor
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

    // 📬 Pedidos recibidos
    Route::get('/agricultor/pedidos', [PedidoController::class, 'index'])->name('agricultor.pedidos');

    // 🚚 Postulaciones de transportistas
    Route::get('/agricultor/postulaciones', [PostulacionTransportistaController::class, 'index'])->name('agricultor.postulaciones');
    Route::post('/agricultor/postulaciones/{id}/responder', [PostulacionTransportistaController::class, 'responder'])->name('agricultor.postulaciones.responder');

    // 👤 Perfil del Agricultor (modo lectura + editar)
    Route::get('/agricultor/perfil', [PerfilController::class, 'edit'])->name('agricultor.perfil');
    Route::post('/agricultor/perfil', [PerfilController::class, 'update'])->name('agricultor.perfil.update');
});


// Dashboards básicos para los otros roles
Route::get('/dashboard-comprador', function () {
    return 'Bienvenido Comprador';
})->middleware(['auth', 'verified'])->name('comprador.dashboard');

Route::get('/dashboard-transportista', function () {
    return 'Bienvenido Transportista';
})->middleware(['auth', 'verified'])->name('transportista.dashboard');

// 👉 Ruta unificada de acceso (login/registro en una sola vista)
Route::view('/acceso', 'auth.unificado')->name('auth.unificado');
// Solicitud del enlace de restablecimiento
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

// Mostrar formulario para nueva contraseña
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/productos-publicos', [\App\Http\Controllers\Publico\CatalogoPublicoController::class, 'index'])->name('productos.publicos');


// Rutas generadas por Breeze
require __DIR__.'/auth.php';
