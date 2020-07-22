<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

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
                                    group by year(fecha_egreso)');

        $this->listosPC = array_column($this->listosPC, 'ReparacionesPC_listas');
        

        $this->listosNotebook = DB::select('select count(*) as ReparacionesNotebook_listas
    								from reparaciones R inner join equipos E
    								on R.id_equipo = E.id_equipo
    								where (R.deleted_at IS NULL) and (R.id_estado = 3) and
    								(E.id_tipoEquipo = 2)
    								group by year(fecha_egreso)
                                    order by year(fecha_egreso)');
 
    	$this->listosNotebook = array_column($this->listosNotebook, 'ReparacionesNotebook_listas');

    }

    public function mostrarBarras()
    {
    	$this->anios = DB::select('select distinct date_format(fecha_egreso, "%Y") as Anios
    							from reparaciones
    							where deleted_at IS NULL and fecha_egreso IS NOT NULL
    							order by Anios Desc');

        $this->anios = array_column($this->anios,'Anios');

        $aniosgrafico = array_reverse($this->anios);

    	$this->reparacionesAnio();
    	$this->reparacionesMes(reset($this->anios));

        //$this->reparacionesMes('2019');
    	 // dd($this->anios);


    	return view('Admin.reportesBarras')
    		->with('PC',json_encode($this->PC,JSON_NUMERIC_CHECK))
    		->with('Notebook',json_encode($this->Notebook,JSON_NUMERIC_CHECK))
    		// ->with('meses',json_encode($this->meses))
            ->with('aniosgrafico',json_encode($aniosgrafico,JSON_NUMERIC_CHECK))
    		->with('anios',$this->anios)
    		->with('listosPC',json_encode($this->listosPC,JSON_NUMERIC_CHECK))
    		->with('listosNotebook',json_encode($this->listosNotebook,JSON_NUMERIC_CHECK));
    }
    
    public function problemasReparaciones()
    {
        $consultaProblemas = DB::select('select P.descripcion as name, count(*) as y
                                    from detallereparaciones D inner join problemas P
                                    on D.id_problema = P.id_problema
                                    inner join reparaciones R 
                                    on D.id_reparacion = R.id_reparacion                                    
                                    where (R.deleted_at IS NULL)
                                    group by P.descripcion
                                    order by (y) Desc
                                    limit 5');

        // dd($consultaProblemas);
        // $consultaProblemas = array_combine(array_column($consultaProblemas, 'name'),array_column($consultaProblemas, 'y'));
        // dd($consultaProblemas);

        // $total = array_sum($consultaProblemas);

        // foreach ($consultaProblemas as $descripcion => $cantidad) {

        //     $consultaProblemas[$descripcion] = ($cantidad * 100)/$total;

        // }

        return $consultaProblemas;
    }

    public function marcasReparadas()
    {
    	$consultaMarcas = DB::select('select M.descripcion as name, count(*) as y
                                    from Reparaciones R inner join Equipos E
                                    on R.id_equipo = E.id_equipo
                                    inner join Marcas M 
                                    on M.id_marca = E.id_marca                                    
                                    where (R.deleted_at IS NULL)
                                    group by M.descripcion
                                    order by (y) Desc
                                    limit 5');

    	return $consultaMarcas;
    }

    public function ingresosMensuales($anio)
    {
        $consultaPC = DB::select('select month(R.fecha_egreso) as Mes, sum(R.total) as Total
                                    from reparaciones R inner join equipos E
                                    on R.id_equipo = E.id_equipo
                                    where (R.deleted_at IS NULL) and (R.id_estado = 3) and
                                    (E.id_tipoEquipo = 1) and (year(R.fecha_egreso) = ?)
                                    group by month(R.fecha_egreso)', [$anio]);


        $consultaPC = array_combine(array_column($consultaPC, 'Mes'),array_column($consultaPC, 'Total'));
        
        // $this->ingresosPC = ['0','0','0','0','0','0','0','0','0','0','0','0'];

        $this->ingresosPC = [0,0,0,0,0,0,0,0,0,0,0,0];

        foreach ($consultaPC as $mes => $cantidad) {

            $this->ingresosPC[$mes-1] = $cantidad;

        }
        
        $consultaNotebook = DB::select('select month(R.fecha_egreso) as Mes, sum(R.total) as Total
                                    from reparaciones R inner join equipos E
                                    on R.id_equipo = E.id_equipo
                                    where (R.deleted_at IS NULL) and (R.id_estado = 3) and
                                    (E.id_tipoEquipo = 2) and (year(R.fecha_egreso) = ?)
                                    group by month(R.fecha_egreso)', [$anio]);

        $consultaNotebook = array_combine(array_column($consultaNotebook, 'Mes'),array_column($consultaNotebook, 'Total'));
        
        $this->ingresosNotebook = [0,0,0,0,0,0,0,0,0,0,0,0];

        foreach ($consultaNotebook as $mes => $cantidad) {

            $this->ingresosNotebook[$mes-1] = $cantidad;

        }
        // dd($this->ingresosPC);

        // return [json_encode($this->ingresosPC,JSON_NUMERIC_CHECK), json_encode($this->ingresosNotebook,JSON_NUMERIC_CHECK)];
        return [$this->ingresosPC, $this->ingresosNotebook];
    }

    public function mostrarTorta()
    {
    	$consultaProblemas = $this->problemasReparaciones();
    	$consultaMarcas = $this->marcasReparadas();

        return view('Admin.reportesTorta')
        	->with('consultaProblemas',json_encode($consultaProblemas))
        	->with('consultaMarcas',json_encode($consultaMarcas));
    }

    public function mostrarLinea()
    {
        // $consultaProblemas = $this->problemasReparaciones();

        $this->anios = DB::select('select distinct date_format(fecha_egreso, "%Y") as Anios
    							from reparaciones
    							where deleted_at IS NULL and fecha_egreso IS NOT NULL
    							order by Anios Desc');

        $this->anios = array_column($this->anios,'Anios');

        $aniosgrafico = array_reverse($this->anios);

        $this->ingresosMensuales(reset($this->anios));

        return view('Admin.reportesLinea')
        ->with('aniosgrafico',json_encode($aniosgrafico,JSON_NUMERIC_CHECK))
    	->with('anios',$this->anios)
        ->with('ingresosPC',json_encode($this->ingresosPC,JSON_NUMERIC_CHECK))
        ->with('ingresosNotebook',json_encode($this->ingresosNotebook,JSON_NUMERIC_CHECK));
            
    }


}
