<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    public function index(Request $request)
    {
        $noticias = Noticia::select('noticias.*')
            ->latest('id')
            ->limit(5)
            ->get();

        return view('usuario.noticias', compact('noticias'));
    }

    public function adminIndex(Request $request)
    {
        $titulo = 'Listado de noticias';

        $noticias = Noticia::select('noticias.*')
            ->latest('id')
            ->get();

        return view('admin.noticias', compact('titulo', 'noticias'));
    }

    public function addForm()
    {
        return view('admin.noticias-add');
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ], [
            'titulo.required' => 'El campo es obligatorio.',
            'contenido.required' => 'El campo es obligatorio',
        ]);

        $noticia = new Noticia();
        $noticia->titulo = $data['titulo'];
        if (isset($data['subtitulo'])) {
            $noticia->subtitulo = $data['subtitulo'];
        }
        $noticia->contenido = $data['contenido'];
        $noticia->save();

        return redirect('/admin/noticias');
    }
}
