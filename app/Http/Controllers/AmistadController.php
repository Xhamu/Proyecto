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
}
