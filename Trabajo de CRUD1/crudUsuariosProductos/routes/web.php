<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;

// Rutas para los recursos de usuarios y productos
Route::resource('usuarios', UsuarioController::class);
Route::resource('productos', ProductoController::class);

// Ruta para la vista de bienvenida
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Ruta para la vista de login
Route::view('/login', 'login')->name('login');

// Ruta para procesar el formulario de login
Route::post('/login', function (Request $request) {
    // Lista de credenciales de prueba
    $credentials = [
        'usuario1' => 'contraseña1',
        'usuario2' => 'contraseña2',
        'usuario3' => 'contraseña3',
        'usuario4' => 'contraseña4',
        'usuario5' => 'contraseña5',
        'usuario6' => 'contraseña6',
    ];

    // Validar credenciales
    if (isset($credentials[$request->usuario]) && $credentials[$request->usuario] === $request->password) {
        // Redirige al dashboard si las credenciales son correctas
        return redirect()->route('dashboard')->with('success', '¡Bienvenido!');
    }

    // Redirigir con error si las credenciales son incorrectas
    return back()->withErrors(['message' => 'Usuario o contraseña incorrectos']);
});

// Ruta para el dashboard (la ventana que tendrá los botones Crear Usuario y Crear Producto)
Route::get('/dashboard', function () {
    return view('dashboard'); // Vista que contiene los botones
})->name('dashboard');

// Rutas de edición para usuarios
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

// Rutas de edición para productos
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');

