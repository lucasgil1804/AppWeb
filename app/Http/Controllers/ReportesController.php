<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function reporteReparacion()
    {
    	// $viewer = ['20', '15', '35', '60'];
    	// dd($viewer);
    	// $click = ['25', '10', '45', '50'];

    	// $usuarios = DB::select('select count(*) as Cantidad_usuarios
    	// 						from users
    	// 						where deleted_at IS NULL
    	// 						group by id_tipoUsuario
    	// 						having id_tipoUsuario between 1 and 3');

    	$listos = DB::select('select count(*) as Reparaciones_listas
    								from reparaciones
    								where (deleted_at IS NULL) and (id_estado = 3)
    								group by month(fecha_ingreso)');

    	$pendientes = DB::select('select count(*) as Reparaciones_pendientes
    								from reparaciones
    								where (deleted_at IS NULL) and (id_estado < 3)
    								group by month(fecha_ingreso)');

    	$meses = DB::select('select distinct date_format(fecha_ingreso, "%M")
    							from reparaciones
    							where deleted_at IS NULL');

    	$listos->toArray();
    	dd($listos);
    	// dd($meses);

    	return view('Admin.pruebaReportes')
    		->with('listos',json_encode($listos,JSON_NUMERIC_CHECK))
    		->with('pendientes',json_encode($pendientes,JSON_NUMERIC_CHECK))
    		->with('meses',json_encode($meses));
    }
}
