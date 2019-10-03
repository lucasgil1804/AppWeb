<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listaUsuario()
    {
        $users=User::withTrashed()->get();

    	return view('Admin.listaUsuario', compact('users'));
    }

    public function listaEmpleado()
    {
        if (Auth::user()->id_tipoUsuario == 1) {
            $empleados=tipoUsuario::find(2);

            $listaEmpleados = $empleados->users()->withTrashed()->get();

            return view('Admin.listaEmpleados', compact('listaEmpleados'));
        }
        else{
            // $users=User::withTrashed()->get();
            // return view('Admin.index', compact('users'));
            return redirect()->route('adminIndex');
            }
    }

    public function listaTecnico()
    {
       if (Auth::user()->id_tipoUsuario == 1) {
        $tecnicos=tipoUsuario::find(3);

        $listaTecnicos = $tecnicos->users()->withTrashed()->get();

        return view('Admin.listaTecnicos', compact('listaTecnicos'));
        }
      else{
        return redirect()->route('adminIndex');
      }
    }

    public function listaCliente()
    {
        $clientes=tipoUsuario::find(4);

        $listaClientes = $clientes->users()->withTrashed()->get();

        return view('Admin.listaClientes', compact('listaClientes'));
    }

    public function index()
    {
        $users=User::withTrashed()->get();

        return view('Admin.index', compact('users'));
    }

    public function nuevoUsuario($tipoUser)
    {
    	return view('Admin.agregarUsuario',compact('tipoUser'));
    }

     public function store()
    {
        // Se realiza una consulta por los tipos de usuarios, y en el caso de que el usuario sea "cliente", se omite la validacion del campo de contraseña, porque un usuario NO puede loguearse.
        $tipoUsuario = request()->input('tipoUser');
        if ($tipoUsuario == 4) {
            $validaciones = [
                'nombre' => 'required',
                'apellido' => 'required',
                'dni' => 'required|numeric|digits_between:6,8|unique:users,dni',
                'email' => 'required|email|unique:users,email',
                'password' => '',
                'password_confirmation' => '',
                'tipoUser' => ''
            ];

            $restricciones = [
                'nombre.required' => '* El campo Nombre es obligatorio.',
                'apellido.required' => '* El campo Apellido es obligatorio.',
                'dni.required' => '* El campo DNI es obligatorio.',
                'dni.numeric' => '* El DNI debe ser solo numerico.',
                'dni.digits_between' => '* El número de DNI debe contener entre 6 y 8 dígitos.',
                'dni.unique' => '* Ya existe un usuario registrado con ese DNI.',
                'email.required' => '* El campo Email es obligatorio.',
                'email.email' => '* Debe ingresar un Email válido.',
                'email.unique' => '* Ya existe un usuario registrado con ese EMAIL.',
            ];
        }
        else {
            $validaciones = [
                'nombre' => 'required',
                'apellido' => 'required',
                'dni' => 'required|numeric|digits_between:6,8|unique:users,dni',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required',
                'tipoUser' => ''
            ];

            $restricciones = [
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
            ];
        }

        $data = request()->validate($validaciones,
        $restricciones
        );
        //$data = request()->all();
        
        if ($tipoUsuario == 4) {
            User::create([
            'id_tipoUsuario' => $data['tipoUser'],   
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            ]);
        }
        else {
            User::create([
            'id_tipoUsuario' => $data['tipoUser'],   
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
            ]);
        }

        Session::flash('flash_message', 'El usuario se guardó correctamente.');

        if ($data['tipoUser'] == 2) {
            return redirect()->route('adminListaEmpleados');
        }

        elseif ($data['tipoUser'] == 3) {
            return redirect()->route('adminListaTecnicos');
        }

        else {
            return redirect()->route('adminListaClientes');
        }
        
    }

    public function detalles($id)
    {
        // $user = User::find($id);

        $user = User::withTrashed()
                ->find($id);

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
            'password' => 'confirmed',
            'password_confirmation' => '',
            // TIPO USUARIO
            'tipoUser' => ''
            // TIPO USUARIO
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
            // 'password.min' => '* La nueva contraseña debe contener al menos 6 dígitos.'
        ]
        );
        // TIPO USUARIO
        // unset($data['id_tipoUsuario']);
        // TIPO USUARIO

        if ($data['password'] != null) 
        {
            $data['password'] = bcrypt($data['password']);
        } 
        else {
            unset($data['password']);
        }

        $user->update($data);

        Session::flash('flash_message', 'El usuario se editó correctamente.');
        return redirect()->route('adminVerDetalle', ['user' => $user]);
    }

    public function bajaUsuario(User $user)
    {
        $user->delete();

        Session::flash('flash_messageExito', 'El usuario se ha dado de baja correctamente.');
        if ($user->id_tipoUsuario == 2)
        {
            return redirect()->route('adminListaEmpleados');
        }
        elseif ($user->id_tipoUsuario == 3)
        {
            return redirect()->route('adminListaTecnicos');
        }
        else
        {
            return redirect()->route('adminListaClientes');
        }
        
    }

    public function altaUsuario($id)
    {

        $user = User::withTrashed()
                    ->find($id);
        $user->restore();

        Session::flash('flash_messageExito', 'El usuario se ha dado de alta correctamente.');
        if ($user->id_tipoUsuario == 2)
        {
            return redirect()->route('adminListaEmpleados');
        }
        elseif ($user->id_tipoUsuario == 3)
        {
            return redirect()->route('adminListaTecnicos');
        }
        else
        {
            return redirect()->route('adminListaClientes');
        }
    }

}
