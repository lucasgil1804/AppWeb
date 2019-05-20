<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function listaUsuario()
    {
        $users=User::all();

    	return view('Admin.listaUsuario', compact('users'));
    }

    public function index()
    {
    	return view('Admin.index');
    }

    public function nuevoUsuario()
    {
    	return view('Admin.agregarUsuario');
    }

     public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'bail|required|numeric|digits_between:6,8|unique:users,dni',
            'email' => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|min:6|confirmed',
            'password_confirmation' => 'required'
        ],
        [
            'nombre.required' => '* El campo Nombre es obligatorio.',
            'apellido.required' => '* El campo Apellido es obligatorio.',
            'dni.required' => '* El campo DNI es obligatorio.',
            'dni.numeric' => '* El DNI debe ser solo numerico.',
            'dni.digits_between' => '* El número de DNI debe contener entre 6 y 8 dígitos.',
            'dni.unique' => '* Ya existe un usuario registrado con ese DNI.',
            'email.required' => '* El campo Email es obligatorio.',
            'email.email' => '* Debe ingresar un Email válido.',
            'email.unique' => '* Ya existe un usuario registrado con ese EMAIL.',
            'password.required' => '* El campo Password es obligatorio.',
            'password.min' => '* La contraseña debe contener al menos 6 dígitos.',
            'password.confirmed' => '* La contraseña no coindice con la anterior.',
            'password_confirmation.required' => '* El campo Confirmar Password es obligatorio.'
        ]
        );
        //$data = request()->all();

        User::create([
         'id_tipoUsuario' => '2',   
         'nombre' => $data['nombre'],
         'apellido' => $data['apellido'],
         'dni' => $data['dni'],
         'email' => $data['email'],
         'password' => bcrypt($data['password'])
        ]);

        Session::flash('flash_message', 'El usuario se guardo correctamente.');

        return redirect()->route('adminListaUsuario');
    }

    public function detalles() {
        //$user = User::find($id);

        //return view('Admin.verDetalle', compact('user'));
        return view('Admin.verDetalle');
    }

}
