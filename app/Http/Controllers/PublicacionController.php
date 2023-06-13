<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacionController extends Controller
{
    public function index(Request $request)
    {
        $titulo = 'Listado de publicaciones';

        $publicaciones = Publicacion::select('publicaciones.*')
            ->with('usuario')
            ->latest('id')
            ->limit(10)
            ->get();

        $usuarioActual = auth()->user();

        return view('admin.publicaciones', compact('titulo', 'publicaciones', 'usuarioActual'));
    }


    public function showPublicacion($id_publicacion)
    {
        $publicacion = Publicacion::select('publicaciones.*')
            ->with('usuario')
            ->where('id', $id_publicacion)
            ->withCount('likes', 'comentarios')
            ->first();

        $comentarios = $publicacion->comentarios()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('usuario.publicacion', compact('publicacion', 'comentarios'));
    }

    public function delete($id)
    {
        $publicacion = Publicacion::find($id);

        if ($publicacion) {
            $publicacion->delete();

            return redirect()->back()->with('success', 'La publicación se ha eliminado correctamente.');
        } else {
            return redirect()->back()->with('error', 'No se encontró la publicación.');
        }
    }

}