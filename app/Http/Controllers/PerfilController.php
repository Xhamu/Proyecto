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

        $publicaciones = $usuario->publicaciones()->with('usuario')->withCount('likes', 'comentarios')->latest()->get();

        $random = User::inRandomOrder()->limit(3)->where('id', '!=', $usuario->id)->get();

        return view('usuario.perfil', compact('usuario', 'publicaciones', 'random'));
    }
}
