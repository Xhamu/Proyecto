<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $model = User::class;
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Campo de email obligatorio.',
            'email.email' => 'Debe ser un email válido.',
            'password.required' => 'Campo contraseña obligatorio.',
            'password.min' => 'Contraseña debe ser mayor a :min caracteres.'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session([
                'nombre' => $user->nombre,
            ]);
            return redirect('/inicio');
        } else {
            return back()->withErrors(['password' => 'Credenciales incorrectas.'])->withInput($request->only('email'));
        }
    }

    public function showRegisterForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'nombre.required' => 'El campo es obligatorio.',
            'email.required' => 'El campo es obligatorio.',
            'email.email' => 'Debe ser un formato válido de correo electrónico.',
            'email.unique' => 'Ya existe un usuario con ese correo electrónico.',
            'password.required' => 'El campo es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ]);

        $user = new User;
        $user->nombre = $request->input('nombre');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->id_rol = 1;
        $user->save();

        return redirect('/login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
