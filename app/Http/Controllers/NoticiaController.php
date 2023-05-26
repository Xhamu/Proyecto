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
}
