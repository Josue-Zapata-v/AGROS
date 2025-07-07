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
use App\Http\Controllers\Comprador\CompradorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\Comprador\PedidoController as PedidoCompradorController;
use App\Http\Controllers\Transportista\TransportistaController;




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
    // ✅ Marcar pedido como listo para envío
    Route::post('/agricultor/pedidos/{id}/marcar-listo', [PedidoController::class, 'marcarListoParaEnvio'])
        ->name('agricultor.pedidos.marcarListo');


    // 🚚 Postulaciones de transportistas
    Route::get('/agricultor/postulaciones', [PostulacionTransportistaController::class, 'index'])->name('agricultor.postulaciones');
    Route::post('/agricultor/postulaciones/{id}/responder', [PostulacionTransportistaController::class, 'responder'])->name('agricultor.postulaciones.responder');
    // Revertir una postulación rechazada (solo si aún no hay transporte asignado)
    Route::post('/agricultor/postulaciones/{id}/revertir', [PostulacionTransportistaController::class, 'revertir'])
        ->name('agricultor.postulaciones.revertir');
        
    // 👤 Perfil del Agricultor (modo lectura + editar)
    Route::get('/agricultor/perfil', [PerfilController::class, 'edit'])->name('agricultor.perfil');
    Route::post('/agricultor/perfil', [PerfilController::class, 'update'])->name('agricultor.perfil.update');
    
});



// Dashboards básicos para los otros roles
Route::get('/dashboard-comprador', [CompradorController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('comprador.dashboard');


Route::get('/dashboard-transportista', [TransportistaController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('transportista.dashboard');
Route::get('/transportista/pedidos-disponibles', [TransportistaController::class, 'pedidosDisponibles'])
    ->middleware(['auth', 'verified'])
    ->name('transportista.pedidos.disponibles');
Route::post('/transportista/postular/{pedido}', [TransportistaController::class, 'postular'])->name('transportista.postular');
// 📄 Mis postulaciones
Route::get('/transportista/mis-postulaciones', [TransportistaController::class, 'misPostulaciones'])
    ->name('transportista.postulaciones');
// 📦 Transportes asignados
Route::get('/transportista/transportes', [TransportistaController::class, 'transportesAsignados'])
    ->name('transportista.transportes');
Route::post('/transportista/transportes/{id}/en-camino', [TransportistaController::class, 'marcarEnCamino'])
    ->name('transportista.transportes.en_camino');
Route::post('/transportista/transportes/{id}/entregado', [TransportistaController::class, 'marcarEntregado'])
    ->name('transportista.transportes.entregado');





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

Route::get('/productos-publicos', [CatalogoPublicoController::class, 'index'])->name('productos.publicos');
Route::get('/comprador/productos/{id}', [CompradorController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('comprador.productos.show');

// web.php
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/agregar-al-carrito', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])
    ->middleware(['auth']) // Protege con auth
    ->name('carrito.agregar');

Route::post('/carrito/actualizar', [App\Http\Controllers\CarritoController::class, 'actualizarCantidad'])->name('carrito.actualizar');
Route::delete('/carrito/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

Route::post('/carrito/entrega', [CarritoController::class, 'guardarEntrega'])
    ->name('carrito.entrega.guardar');
Route::get('/carrito/confirmacion', [CarritoController::class, 'confirmarPedido'])
    ->name('carrito.confirmacion');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/mis-pedidos', [PedidoCompradorController::class, 'index'])->name('comprador.pedidos');
});
Route::get('/mis-pedidos/{pedido}', [PedidoController::class, 'verDetalle'])
    ->middleware(['auth', 'verified'])
    ->name('comprador.detalle');


// Rutas generadas por Breeze
require __DIR__.'/auth.php';
