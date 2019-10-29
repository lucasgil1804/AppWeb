<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Reparacion;
use App\Models\TipoEquipo;
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

    public function detallesReparacion($id)
    {
    	$reparacion = Reparacion::withTrashed()->find($id);

    	return view('Admin.detalleReparacion', compact('reparaciones'));
    }

}
