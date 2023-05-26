<?php

namespace App\Http\Controllers;

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
            ->latest('id')
            ->get();

        $amistades = $user->amistades;

        if ($user->amistades) {
            foreach ($amistades as $amistad) {
                $publicaciones = $publicaciones->merge($amistad->usuario->publicaciones->with('usuario')->latest()->get());
            }
        }

        //Noticias
        $noticias = Noticia::select('noticias.*')
            ->latest('id')
            ->limit(5)
            ->get();

        return view('usuario.index', compact('publicaciones', 'noticias'));
    }
}
