<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
	// Este grafico muestra la cantidad de reparaciones listas y pendientes en el sistema
	// y agrupados por mes de un año especifico.

    public function reparacionesMes($anio)
    {
    	// $usuarios = DB::select('select count(*) as Cantidad_usuarios
    	// 						from users
    	// 						where deleted_at IS NULL
    	// 						group by id_tipoUsuario
    	// 						having id_tipoUsuario between 1 and 3');

    	// $this->listos = DB::select('select count(*) as Reparaciones_listas
    	// 							from reparaciones
    	// 							where (deleted_at IS NULL) and (id_estado = 3) and (year(fecha_ingreso) = ?)
    	// 							group by month(fecha_ingreso)', [$anio]);

        // $listos = DB::table('reparaciones')
        //                     ->select(DB::Raw('count(*) as Reparaciones_listas'))
        //                     ->where([
        //                         ['deleted_at','=', null],
        //                         ['id_estado', 3]
        //                     ])
        //                     ->groupBy(DB::raw('month(fecha_ingreso)'))
        //                     ->get()->toArray();

        // $this->listos= array_column($this->listos, 'Reparaciones_listas');


    	// $this->pendientes = DB::select('select count(*) as Reparaciones_pendientes
    	// 							from reparaciones
    	// 							where (deleted_at IS NULL) and (id_estado < 3) and (year(fecha_ingreso) = ?)
    	// 							group by month(fecha_ingreso)', [$anio]);

    	// $this->pendientes = array_column($this->pendientes, 'Reparaciones_pendientes');

    	$consultaPC = DB::select('select month(R.fecha_egreso) as Mes, count(*) as Cantidad_Reparaciones
    								from reparaciones R inner join equipos E
    								on R.id_equipo = E.id_equipo
    								where (R.deleted_at IS NULL) and (R.id_estado = 3) and
    								(E.id_tipoEquipo = 1) and (year(R.fecha_egreso) = ?)
    								group by month(R.fecha_egreso)', [$anio]);
    	 

        $consultaPC = array_combine(array_column($consultaPC, 'Mes'),array_column($consultaPC, 'Cantidad_Reparaciones'));
    	
        $this->PC = ['0','0','0','0','0','0','0','0','0','0','0','0'];

        foreach ($consultaPC as $mes => $cantidad) {

            $this->PC[$mes-1] = $cantidad;

        }

    	$consultaNotebook = DB::select('select month(R.fecha_egreso) as Mes, count(*) as Cantidad_Reparaciones
    								from reparaciones R inner join equipos E
    								on R.id_equipo = E.id_equipo
    								where (R.deleted_at IS NULL) and (R.id_estado = 3) and
    								(E.id_tipoEquipo = 2) and (year(R.fecha_egreso) = ?)
    								group by month(R.fecha_egreso)', [$anio]);

        $consultaNotebook = array_combine(array_column($consultaNotebook, 'Mes'),array_column($consultaNotebook, 'Cantidad_Reparaciones'));
        
    	$this->Notebook = ['0','0','0','0','0','0','0','0','0','0','0','0'];

        foreach ($consultaNotebook as $mes => $cantidad) {

            $this->Notebook[$mes-1] = $cantidad;

        }


        // $this->meses = DB::select('select distinct date_format(fecha_egreso, "%M") as Meses
    				// 			from reparaciones
    				// 			where (deleted_at IS NULL) and (fecha_egreso IS NOT NULL)
    				// 			order by fecha_egreso');

        // $this->meses = array_column($this->meses,'Meses');

        // dd($this->meses);

        
        return [$this->PC,$this->Notebook];
      //   return view('Admin.reportesBarras')
    		// ->with('listos',json_encode($this->listos,JSON_NUMERIC_CHECK))
    		// ->with('pendientes',json_encode($this->pendientes,JSON_NUMERIC_CHECK))
    		// ->with('meses',json_encode($this->meses))
    		// ->with('anios', $this->anios);

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
    	$this->anios = DB::select('select distinct date_format(fecha_egreso, "%Y") as Anios
    							from reparaciones
    							where deleted_at IS NULL and fecha_egreso IS NOT NULL
    							order by Anios');

        $this->anios = array_column($this->anios,'Anios');

    	$this->reparacionesAnio();
    	$this->reparacionesMes(reset($this->anios));

        //$this->reparacionesMes('2019');
    	// dd($this->anios);


    	return view('Admin.reportesBarras')
    		->with('PC',json_encode($this->PC,JSON_NUMERIC_CHECK))
    		->with('Notebook',json_encode($this->Notebook,JSON_NUMERIC_CHECK))
    		// ->with('meses',json_encode($this->meses))
    		->with('anios', $this->anios)
    		->with('listosPC',json_encode($this->listosPC,JSON_NUMERIC_CHECK))
    		->with('listosNotebook',json_encode($this->listosNotebook,JSON_NUMERIC_CHECK));
    }
}
