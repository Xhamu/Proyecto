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
            ->get();

        $usuarioActual = auth()->user();

        return view('admin.usuarios', compact('titulo', 'usuarios', 'usuarioActual'));
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

    public function editUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Rol::all();

        return view('usuario.usuarios-edit', compact('usuario', 'roles'));
    }

    public function updateUsuario(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable',
            'rol' => 'required|exists:roles,id',
        ]);

        $usuario = User::findOrFail($id);
        $usuario->nombre = $request->input('nombre');
        $usuario->username = $request->input('username');
        $usuario->email = $request->input('email');

        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->input('password'));
        }

        $rol = Rol::find($request->input('rol'));
        $usuario->id_rol = $rol->id;

        $usuario->save();

        return redirect()->back()->with('success', 'El usuario se ha actualizado correctamente.');
    }

    public function addForm()
    {
        $roles = Rol::all(); // Obtener todos los roles desde la base de datos

        return view('admin.usuarios-add', compact('roles'));
    }

    public function addUsuario(Request $request)
    {
        $messages = [
            'nombre.required' => 'El campo nombre es requerido.',
            'username.required' => 'El campo username es requerido.',
            'username.unique' => 'El username ya está en uso.',
            'email.required' => 'El campo email es requerido.',
            'email.email' => 'El formato del email no es válido.',
            'email.unique' => 'El email ya está en uso.',
            'password.required' => 'El campo password es requerido.',
            'rol.required' => 'Debe seleccionar un rol.',
            'rol.exists' => 'El rol seleccionado no es válido.',
        ];

        $request->validate([
            'nombre' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'rol' => 'required|exists:roles,id',
        ], $messages);

        $usuario = new User();
        $usuario->nombre = $request->input('nombre');
        $usuario->username = $request->input('username');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));

        $rol = Rol::find($request->input('rol'));
        $usuario->id_rol = $rol->id;

        $usuario->save();

        return redirect()->back()->with('success', 'El usuario se ha creado correctamente.');
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