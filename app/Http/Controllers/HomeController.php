<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Noticia;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function showInicio()
    {
        //Publicaciones
        $user = auth()->user();

        $publicaciones = Publicacion::select('publicaciones.*')
            ->with('usuario')
            ->withCount('likes', 'comentarios')
            ->latest('id')
            ->get();

        $amistades = $user->amistades;

        if ($user->amistades) {
            foreach ($amistades as $amistad) {
                $publicaciones = $publicaciones->merge($amistad->usuario->publicaciones->with('usuario')->withCount('likes', 'comentarios')->latest()->get());
            }
        }

        //Noticias
        $noticias = Noticia::select('noticias.*')
            ->latest('id')
            ->limit(5)
            ->get();

        return view('usuario.index', compact('publicaciones', 'noticias'));
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

    public function likear($publicacion_id)
    {
        $user = auth()->user();

        if ($user->likes->contains('publicacion_id', $publicacion_id)) {
            return redirect()->back()->with('error', 'Ya has dado like a esta publicación.');
        }

        $like = new Like();
        $like->user_id = $user->id;
        $like->publicacion_id = $publicacion_id;
        $like->save();

        return redirect()->back()->with('success', 'Has dado like a la publicación.');
    }
}
