<?php

namespace App\Http\Controllers;

use App\Models\Amistad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AmistadController extends Controller
{
    public function index($id)
    {
        $amigos = Amistad::select('amistades.amigo_id')
            ->where('user_id', $id)
            ->pluck('amigo_id');

        $amistades = User::whereIn('id', $amigos)->get();

        return view('usuario.amistades', compact('amistades'));
    }

    public function eliminarAmigo($id)
    {
        $usuarioActual = auth()->user();

        // Buscar la amistad existente
        $amistad = Amistad::where('user_id', $usuarioActual->id)
            ->where('amigo_id', $id)
            ->first();

        if ($amistad) {
            // Eliminar la amistad
            $amistad->delete();

            return redirect()->back()->with('success', 'Amistad eliminada exitosamente.');
        } else {
            return redirect()->back()->with('error', 'No se encontró la amistad.');
        }
    }
}