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

    public function comentar(Request $request, $publicacion_id)
    {
        $data = $request->validate([
            'contenido' => 'required',
        ]);

        $user = auth()->user();

        $comentario = new Comentario();
        $comentario->user_id = $user->id;
        $comentario->publicacion_id = $publicacion_id;
        $comentario->contenido = $data['contenido'];
        $comentario->save();

        return redirect()->back();
    }
}
