<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use Illuminate\Http\Request;


class ReparacionController extends Controller
{
    public function consultaEquipo(){

    	$idReparacion = request()->input('idReparacion');
    	$reparacion =  Reparacion::find($idReparacion);
    	dd($detalles = $reparacion->detalles()->withTrashed()->get()); 

    }

    public function vistaConsulta() 
    {
    	return view('consultaEstado');
    }
}
