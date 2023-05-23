<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rutas públicas
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');

// Rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/inicio', function () {
        return view('usuario.index');
    });

    Route::get('/usuario/{id}', function () {
        return view('usuario.perfil');
    });

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Rutas para el administrador (requiere autenticación y tener el rol de administrador)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });
});
