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
        // $data = request()->validate([
        //     'nombre' => 'required'
        // ],
        // [
        //     'nombre.required' => 'El campo nombre es obligatorio'
        // ]
        // );
        $data = request()->all();

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
