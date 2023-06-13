<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $titulo = 'Listado de usuarios';

        $sort = $request->query('sort');

        $usuarios = User::select('users.*')
            ->latest('id')
            ->when($request->has('nombre'), function ($query) use ($request) {
                return $query->where('users.nombre', 'like', '%' . $request->query('nombre') . '%');
            })
            ->when($request->has('email'), function ($query) use ($request) {
                return $query->where('users.email', 'like', '%' . $request->query('email') . '%');
            })
            ->when($request->has('profesion'), function ($query) use ($request) {
                return $query->whereIn('users.id_rol', $request->query('rol'));
            })
            ->when($sort, function ($query) use ($sort) {
                $column = ltrim($sort, '-');
                $direction = $sort[0] == '-' ? 'desc' : 'asc';
                return $query->orderBy($column, $direction);
            }, function ($query) {
            return $query->orderBy('users.id', 'asc');
        })
            ->paginate(20)
            ->withQueryString();

        $usuarioActual = auth()->user();

        return view('admin.usuarios', compact('titulo', 'usuarios', 'usuarioActual'));
    }

    public function crear()
    {
        $roles = Rol::all();

        return view('admin.usuarios-crear', compact('roles'));
    }

    public function mostrar($id)
    {
        $usuario = User::leftJoin('profesions', 'profesions.id', '=', 'usuarios.id_profesion')
            ->select('usuarios.id', 'usuarios.nombre', 'usuarios.email', 'usuarios.fecha', 'profesions.titulo')
            ->find($id);

        if (is_null($usuario)) {
            return view('errores.404');
        }

        $roleName = $usuario->roles->pluck('name')->implode(', ');

        return view('admin.usuarios-mostrar', compact('usuario', 'roleName'));
    }

    public function add()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'email' => ['required', 'email', 'unique:usuarios,email'],
            'fecha' => 'required|date',
            'id_profesion' => 'required|exists:profesions,id',
            'password' => 'required|min:6',
            'roles' => 'required',
        ], [
                'nombre.required' => 'El campo es obligatorio.',
                'email.required' => 'El campo es obligatorio.',
                'email.email' => 'Debe ser un formato válido.',
                'email.unique' => 'Ya existe un usuario con ese email.',
                'fecha.required' => 'El campo es obligatorio.',
                'fecha.date' => 'Debe ser una fecha válida.',
                'id_profesion.required' => 'El campo es obligatorio.',
                'id_profesion.exists' => 'La profesión seleccionada no existe.',
                'password.required' => 'El campo es obligatorio.',
                'password.min' => 'La contraseña debe tener al menos :min caracteres.',
                'roles.required' => 'El campo es obligatorio.',
            ]);

        $user = User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);

        $user->assignRole($data['roles']);

        return redirect()->route('admin.usuarios');
    }

    public function editar($id)
    {
        $titulo = 'Editar usuario';

        $usuario = User::find($id);

        if (is_null($usuario)) {
            return view('errores.404');
        }

        $roles = Rol::all();

        return view('admin.usuarios-editar', compact('titulo', 'usuario', 'profesiones', 'roles'));
    }

    public function update($id)
    {
        $usuario = User::find($id);

        if (is_null($usuario)) {
            return view('errores.404');
        }

        $data = request()->validate([
            'nombre' => 'required',
            'email' => ['required|email|unique:users,email'],
            'username' => ['required|email|unique:users,username'],
            'password' => 'nullable|min:6',
            'roles' => 'required',
        ], [
                'nombre.required' => 'El campo nombre es obligatorio.',
                'email.required' => 'El campo email es obligatorio.',
                'email.email' => 'Debe ser un formato válido.',
                'email.unique' => 'Ya existe un usuario con ese email.',
                'fecha.required' => 'El campo fecha es obligatorio.',
                'fecha.date' => 'Debe ser una fecha válida.',
                'id_profesion.required' => 'El campo profesion es obligatorio.',
                'id_profesion.exists' => 'La profesión seleccionada no existe.',
                'password.min' => 'La contraseña debe tener al menos :min caracteres',
                'roles.required' => 'El campo es obligatorio',
            ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $usuario->roles()->detach();

        $usuario->assignRole($data['roles']);

        $usuario->update($data);

        return redirect()->route('admin.usuarios');
    }

    public function delete($id)
    {
        $usuario = User::find($id);

        if ($usuario) {
            // Verificar si el usuario actual es el mismo que se intenta eliminar
            if ($usuario->id === auth()->user()->id) {
                return redirect()->back()->with('error', 'No tienes permiso para eliminar tu propio usuario.');
            }

            $usuario->delete();

            return redirect()->back()->with('success', 'El usuario se ha eliminado correctamente.');
        } else {
            return redirect()->back()->with('error', 'No se encontró el usuario.');
        }
    }

}