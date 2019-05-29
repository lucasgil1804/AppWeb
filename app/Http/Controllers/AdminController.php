<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

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
            'dni' => 'required|numeric|digits_between:6,8|unique:users,dni',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
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
         'password' => encrypt($data['password'])
        ]);

        Session::flash('flash_message', 'El usuario se guardó correctamente.');

        return redirect()->route('adminListaUsuario');
    }

    public function detalles(User $user)
    {
        //$user = User::find($id);

        return view('Admin.verDetalle', compact('user'));
    }

    public function editar(User $user)
    {
        return view('Admin.editarUsuario', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => [
                'required',
                'numeric',
                'digits_between:6,8',
                Rule::unique('users', 'dni')->ignore($user->id_usuario, 'id_usuario')
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id_usuario, 'id_usuario')
            ],
            'password' => 'confirmed|min:6',
            'password_confirmation' => ''
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
            'password.confirmed' => '* La contraseña no coindice con la anterior.',
            'password.min' => '* La nueva contraseña debe contener al menos 6 dígitos.'
        ]
        );

        if ($data['password'] != null) 
        {
            $data['password'] = encrypt($data['password']);
        } 
        else {
            unset($data['password']);
        }

        $user->update($data);

        Session::flash('flash_message', 'El usuario se editó correctamente.');
        return redirect()->route('adminVerDetalle', ['user' => $user]);
    }

    public function delete(User $user)
    {
        //$user = User::find($id);
        //dd($user);
        $user->estado = 0;
        $user->save();
        //$data = ['nombre' => 'cosme'];
        //$user->update($data);

        return redirect()->route('adminListaUsuario');
    }

}
