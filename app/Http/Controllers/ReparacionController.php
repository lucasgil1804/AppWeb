<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    public function consultaEquipo(){

    	dd($idReparacion=request()->input('idReparacion'));

    }

    public function vistaConsulta() 
    {
    	return view('consultaEstado');
    }
}
