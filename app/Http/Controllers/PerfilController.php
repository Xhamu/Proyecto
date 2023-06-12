<?php

namespace App\Http\Controllers;

use App\Models\Amistad;
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

    public function añadirAmigo(Request $request, $id)
    {
    // Obtener el usuario actual
    $usuarioActual = auth()->user();

    // Verificar si el usuario existe
    $usuario = User::find($id);
    if (is_null($usuario)) {
        return redirect('/')->with('error', 'El usuario no existe');
    }

    // Verificar si ya son amigos
    if ($usuarioActual->amistades()->where('amigo_id', $usuario->id)->exists()) {
        return redirect()->back()->with('error', 'Ya son amigos');
    }

    // Crear la relación de amistad
    $amistad = new Amistad();
    $amistad->user_id = $usuarioActual->id;
    $amistad->amigo_id = $usuario->id;
    $amistad->save();

    return redirect()->back()->with('success', 'Amigo añadido correctamente');
    }
}
