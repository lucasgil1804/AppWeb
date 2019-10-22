<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Reparacion;
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
}
