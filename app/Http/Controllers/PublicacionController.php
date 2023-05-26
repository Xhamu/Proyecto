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
}
