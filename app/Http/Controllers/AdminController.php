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
            'dni' => 'bail|required|max:8|min:7|numeric',
            'email' => 'required',
            'password' => 'required',
            'comfirmpassword' => 'required'
        ],
        [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'apellido.required' => 'El campo Apellido es obligatorio.',
            'dni.required' => 'El campo DNI es obligatorio.',
            'dni.max' => 'El numero maximo para el DNI es de 8 digitos.',
            'dni.min' => 'El numero minimo para el DNI es de 7 digitos.',
            'dni.numeric' => 'El DNI debe ser solo numerico.',
            'email.required' => 'El campo Email es obligatorio.',
            'password.required' => 'El campo Password es obligatorio.',
            'comfirmpassword.required' => 'El campo Comfirmar Password es obligatorio.'
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

}
