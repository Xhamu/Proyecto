<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function index(Request $request)
    {
        $titulo = 'Listado de comentarios';

        $comentarios = Comentario::select('comentarios.*')
            ->with('usuario', 'publicacion')
            ->latest('id')
            ->limit(10)
            ->get();

        $usuarioActual = auth()->user();

        return view('admin.comentarios', compact('titulo', 'comentarios', 'usuarioActual'));
    }
}
