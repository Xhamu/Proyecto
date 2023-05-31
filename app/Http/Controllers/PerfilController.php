<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{

    public function showPerfil($id)
    {
        $usuario = User::find($id);

        if (is_null($usuario)) {
            return redirect('/');
        }

        $publicaciones = $usuario->publicaciones()->with('usuario')->withCount('likes', 'comentarios')->latest()->get();

        $random = User::inRandomOrder()->limit(3)->where('id', '!=', $usuario->id)->get();

        $esAmigo = false;
        if (auth()->check()) {
            $usuarioActual = auth()->user();
            $esAmigo = $usuarioActual->amistades()->where('amigo_id', $usuario->id)->exists();
        }

        return view('usuario.perfil', compact('usuario', 'publicaciones', 'random', 'esAmigo'));
    }
}
