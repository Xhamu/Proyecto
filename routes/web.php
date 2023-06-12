<?php

use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\AmistadController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UserController;
use App\Models\Publicacion;
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
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');

// Rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/inicio', [HomeController::class, 'showInicio'])->name('usuario.index');

    Route::get('/usuario/{id}', [PerfilController::class, 'showPerfil'])->name('usuario.perfil');

    Route::get('/usuario/{id}/amistades', [AmistadController::class, 'index'])->name('usuario.amistades');

    Route::get('/usuario/{id}/editar', function () {
        return view('usuario.amistades');
    });

    Route::post('/usuario/{id}/añadir-amigo', [PerfilController::class, 'añadirAmigo'])->name('usuario.añadirAmigo');

    Route::post('/unfollow/{id}', [AmistadController::class, 'eliminarAmigo'])->name('usuario.unfollow');

    Route::post('/publicar', [HomeController::class, 'publicar'])->name('publicaciones.publicar');

    Route::get('/publicacion/{id}', [PublicacionController::class, 'showPublicacion'])->name('publicaciones.show');

    Route::post('/comentar/{id}', [ComentarioController::class, 'comentar'])->name('publicaciones.comentar');

    Route::get('/like/{id}', [HomeController::class, 'likear'])->name('publicaciones.likear');

    Route::get('/noticias', [NoticiaController::class, 'index'])->name('usuario.noticias');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

//Rutas usuarios rol admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminIndexController::class, 'index'])->name('admin.index');
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.usuarios');
    Route::get('/admin/publicaciones', [PublicacionController::class, 'index'])->name('admin.publicaciones');
    Route::get('/admin/comentarios', [ComentarioController::class, 'index'])->name('admin.comentarios');
    Route::get('/admin/noticias', [NoticiaController::class, 'adminIndex'])->name('admin.noticias');
    Route::get('/admin/noticias/añadir', [NoticiaController::class, 'addForm'])->name('admin.noticias-add');
    Route::post('/admin/noticias/add', [NoticiaController::class, 'add'])->name('admin.noticias.add');
});

// Ruta para redireccionar al login si no está autenticado
Route::fallback(function () {
    return redirect()->back();
});
