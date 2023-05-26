<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminIndexController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = User::select('users.*')
            ->latest('id')
            ->limit(10)
            ->get();

        $publicaciones = Publicacion::select('publicaciones.*')
            ->with('usuario')
            ->latest('id')
            ->limit(10)
            ->get();

        $comentarios = Comentario::select('comentarios.*')
            ->with('usuario', 'publicacion')
            ->latest('id')
            ->limit(10)
            ->get();


        return view('admin.index', compact('usuarios', 'publicaciones', 'comentarios'));
    }
}
