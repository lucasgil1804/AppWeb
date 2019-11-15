<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Reparacion;
use App\Models\TipoEquipo;
use App\Models\User;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;


class ReparacionController extends Controller
{
    public function consultaEquipo(){

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
        $tipoUsuario = TipoUsuario::find(4);
        $listaClientes = $tipoUsuario->users()->get();
        return view('Admin.agregarReparacion',compact('cliente','listaClientes'));
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

}
