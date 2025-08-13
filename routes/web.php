<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;

// ================== RUTAS PÚBLICAS ==================
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'handleLogin')->name('login.post');
    Route::get('/logout', 'logout')->name('logout');
});

// ================== RUTAS PROTEGIDAS ==================
Route::middleware('auth.session')->group(function () {
    // Página principal
    Route::get('/', [ProductoController::class, 'index'])->name('home');
    Route::get('/home', [ProductoController::class, 'index'])->name('home');
    
    // Rutas de productos
    Route::prefix('productos')->group(function () {
        Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
        Route::get('/create', [ProductoController::class, 'create'])->name('productos.create');
        Route::post('/', [ProductoController::class, 'store'])->name('productos.store');
        Route::get('/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
        Route::put('/{producto}', [ProductoController::class, 'update'])->name('productos.update');
        Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    });
    
    // Rutas del carrito
    Route::prefix('carrito')->controller(CarritoController::class)->group(function () {
        Route::get('/', 'index')->name('carrito.index');
        Route::post('/agregar/{id}', 'agregar')->name('carrito.agregar');
        Route::delete('/eliminar/{id}', 'eliminar')->name('carrito.eliminar');
    });

    // Rutas de usuarios (solo create y store)
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
});