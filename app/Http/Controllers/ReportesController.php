<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
	// Este grafico muestra la cantidad de reparaciones listas y pendientes en el sistema
	// y agrupados por mes de un año especifico.

    public function reparacionesMes()
    {
    	// $usuarios = DB::select('select count(*) as Cantidad_usuarios
    	// 						from users
    	// 						where deleted_at IS NULL
    	// 						group by id_tipoUsuario
    	// 						having id_tipoUsuario between 1 and 3');

    	$this->listos = DB::select('select count(*) as Reparaciones_listas
    								from reparaciones
    								where (deleted_at IS NULL) and (id_estado = 3)
    								group by month(fecha_ingreso)');

        // $listos = DB::table('reparaciones')
        //                     ->select(DB::Raw('count(*) as Reparaciones_listas'))
        //                     ->where([
        //                         ['deleted_at','=', null],
        //                         ['id_estado', 3]
        //                     ])
        //                     ->groupBy(DB::raw('month(fecha_ingreso)'))
        //                     ->get()->toArray();

        $this->listos= array_column($this->listos, 'Reparaciones_listas');


    	$this->pendientes = DB::select('select count(*) as Reparaciones_pendientes
    								from reparaciones
    								where (deleted_at IS NULL) and (id_estado < 3)
    								group by month(fecha_ingreso)');

    	$this->pendientes = array_column($this->pendientes, 'Reparaciones_pendientes');

        $this->meses = DB::select('select distinct date_format(fecha_ingreso, "%M") as Meses
    							from reparaciones
    							where deleted_at IS NULL');

        $this->meses = array_column($this->meses,'Meses');

    }

    public function reparacionesAnio()
    {
    	$this->listosPC = DB::select('select count(*) as ReparacionesPC_listas
    								from reparaciones R inner join equipos E
    								on R.id_equipo = E.id_equipo
    								where (R.deleted_at IS NULL) and (R.id_estado = 3) and
    								(E.id_tipoEquipo = 1)
    								group by year(fecha_ingreso)');

    	$this->listosPC = array_column($this->listosPC, 'ReparacionesPC_listas');


    	$this->listosNotebook = DB::select('select count(*) as ReparacionesNotebook_listas
    								from reparaciones R inner join equipos E
    								on R.id_equipo = E.id_equipo
    								where (R.deleted_at IS NULL) and (R.id_estado = 3) and
    								(E.id_tipoEquipo = 2)
    								group by year(fecha_ingreso)');

    	$this->listosNotebook = array_column($this->listosNotebook, 'ReparacionesNotebook_listas');
    }

    public function mostrarBarras()
    {
    	$this->reparacionesMes();
    	$this->reparacionesAnio();

    	return view('Admin.reportesBarras')
    		->with('listos',json_encode($this->listos,JSON_NUMERIC_CHECK))
    		->with('pendientes',json_encode($this->pendientes,JSON_NUMERIC_CHECK))
    		->with('meses',json_encode($this->meses))
    		->with('listosPC',json_encode($this->listosPC,JSON_NUMERIC_CHECK))
    		->with('listosNotebook',json_encode($this->listosNotebook,JSON_NUMERIC_CHECK));
    }
}
