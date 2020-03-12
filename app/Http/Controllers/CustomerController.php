<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use Illuminate\Http\Request;
use PDF;

class CustomerController extends Controller
{
    public function printPDF($id)
    {
       $reparacion=Reparacion::find($id);
  
    	$data = [
    				'cliente' => $reparacion->usuario->apeYNom(),
                    'id'    => $reparacion->id_reparacion,
    				'fecha' => $reparacion->fecha_ingreso,
                    'dni'   => $reparacion->usuario->dni,
    				'marca' => $reparacion->equipo->marca->descripcion,
                    'modelo'=> $reparacion->equipo->modelo        
            	];
        
        // $pdf = PDF::loadView('Admin.pdf_view', $data);
        $pdf = PDF::loadView('Admin.pdf_view',$data); 
        session()->forget('idReparacion'); 
        return $pdf->stream('medium.pdf');
    }
}