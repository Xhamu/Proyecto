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

    public function showPublications(Request $request)
    {
        $user = auth()->user();

        $publicaciones = Publicacion::select('publicaciones.*')
            ->with('usuario')
            ->latest('id')
            ->get();

        $amistades = $user->amistades;

        if ($user->amistades) {
            foreach ($amistades as $amistad) {
                $publicaciones = $publicaciones->merge($amistad->usuario->publicaciones->with('usuario')->latest()->get());
            }
        }

        return view('usuario.index', compact('publicaciones'));
    }

    public function publicar(Request $request)
    {
        $request->validate([
            'demo-message' => 'required|max:255',
        ]);

        $user = auth()->user();

        $publicacion = new Publicacion();
        $publicacion->contenido = $request->input('demo-message');
        $publicacion->user_id = $user->id;
        $publicacion->save();

        return redirect()->back()->with('success', 'Publicación creada exitosamente.');
    }
}
