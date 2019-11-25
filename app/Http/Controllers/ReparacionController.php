<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Reparacion;
use App\Models\TipoEquipo;
use App\Models\Equipo;
use App\Models\Marca;
use App\Models\User;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;


class ReparacionController extends Controller
{
    public function consultaEquipo()
    {

    	$idReparacion = request()->input('idReparacion');
    	$dni = request()->input('dni');
        $reparacion =  Reparacion::find($idReparacion);
        if (is_null($reparacion)|| ($reparacion->usuario->dni!=$dni)) {
            Session::flash('message_error', '   El número de seguimiento ingresado es incorrecto o no existe.');
            return redirect()->route('estadoEquipo');
        }
        
    	$detalles = $reparacion->detalles()->withTrashed()->get();
    	return view('consultaEstado', compact('reparacion','detalles')); 

    }

    public function vistaConsulta() 
    {
    	return view('consultaEstado');
    }

    public function listaPCs() 
    {
       //$reparaciones=Reparacion::withTrashed()->get();
        $tipoEquipo=TipoEquipo::find(1);
        $reparaciones=$tipoEquipo->reparaciones()->withTrashed()->get();
        return view('Admin.listaPCs', compact('reparaciones'));
    }

    public function listaNotebooks() 
    { 
        $tipoEquipo=TipoEquipo::find(2);
        $reparaciones=$tipoEquipo->reparaciones()->withTrashed()->get();
        return view('Admin.listaNotebooks', compact('reparaciones'));
    }

    public function bajaReparacion(Reparacion $reparacion)
    {
        $reparacion->delete();

        Session::flash('flash_messageExito', 'La reparación se ha dado de baja correctamente.');
        if ($reparacion->equipo->id_tipoEquipo == 1)
        {
            return redirect()->route('listaPCs');
        }
        else
        {
            return redirect()->route('listaNotebooks');
        }
        
    }


    public function AltaReparacion($id)
    {
        $reparacion = Reparacion::withTrashed()
                    ->find($id);
        $reparacion->restore();

        Session::flash('flash_messageExito', 'La reparación se ha dado de alta correctamente.');
        if ($reparacion->equipo->id_tipoEquipo == 1)
        {
            return redirect()->route('listaPCs');
        }
        else
        {
            return redirect()->route('listaNotebooks');
        }
    }
  
    public function detallesReparacion($id)
    {
    	$reparacion = Reparacion::withTrashed()->find($id);
    	$detalles = $reparacion->detalles()->withTrashed()->get();
    	
    	return view('Admin.detalleReparacion', compact('reparacion','detalles'));
    }

    public function nuevaReparacion()
    {
        //$cliente=User::withTrashed()->find(1);
        $cliente=null;
        $equipo = null;
        $tipoUsuario = TipoUsuario::find(4);
        $listaClientes = $tipoUsuario->users()->get();
        $listaEquipos = Equipo::get();

        return view('Admin.agregarReparacion',compact('cliente','listaClientes','equipo','listaEquipos'));
    }

    public function mostrarCliente($id)
    {
        $cliente=User::withTrashed()->find($id);
        return view('Admin.mostrarCliente',compact('cliente'));
    }

    public function tablaCliente()
    {
        $cliente=null;
        $tipoUsuario = TipoUsuario::find(4);
        $listaClientes = $tipoUsuario->users()->get();

        return view('Admin.tablaCliente', compact('listaClientes','cliente'));
    }

    public function nuevoCliente()
    {
        $tipoUser = 4;

        return view('Admin.formularioCliente', compact('tipoUser'));
    }

    public function guardarCliente()
    {
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
        
        $data = request()->validate($validaciones,
        $restricciones);
        
        $data = request()->all();
            User::create([
            'id_tipoUsuario' => 4,   
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            ]);
        

        Session::flash('flash_messageExito', 'El cliente se guardó correctamente.');
        
        return redirect()->route('adminNuevaReparacion');
    }
  
    public function tablaEquipo()
    {
        $equipo = null;
        $listaEquipos = Equipo::get();

        return view('Admin.tablaEquipo', compact('listaEquipos','equipo'));
    }

    public function mostrarEquipo($id)
    {
        $equipo=Equipo::find($id);
        return view('Admin.mostrarEquipo',compact('equipo'));
    }

    public function nuevoEquipo() 
    {
        $equipo = Equipo::get();
        $marcas = Marca::get();
        $tiposEquipo = TipoEquipo::get();

        return view('Admin.formularioEquipo', compact('equipo','marcas','tiposEquipo'));
    }

    public function enDiagnostico() 
    {
        return view('Admin.enDiagnostico');
    }

    public function enReparacion() 
    {
        return view('Admin.enReparacion');
    }
  
    public function guardarEquipo()
    {
        $data = request()->all();
            Equipo::create([
                'id_marca' => $data['selectMarca'],
                'id_tipoEquipo' => $data['selectTipo'],
                'modelo' => $data['modelo']
            ]);

        Session::flash('flash_messageExito', 'El equipo se guardó correctamente.');

        return redirect()->route('adminNuevaReparacion');
    }

}
