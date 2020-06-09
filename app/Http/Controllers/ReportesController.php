<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function reporteReparacion()
    {
    	$viewer = ['20', '15', '35', '60'];
    	$click = ['25', '10', '45', '50'];

    	return view('Admin.pruebaReportes')
    		->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
    		->with('click',json_encode($click,JSON_NUMERIC_CHECK));
    }
}
