<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Equipo;
use App\Models\Marca;
use App\Models\Problema;
use App\Models\Reparacion;
use App\Models\TipoEquipo;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;


class ReparacionController extends Controller
{
    public function consultaEquipo()
    {

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
    
    public function bajaDetalle(Reparacion $reparacion)
    {
        $detalles=$reparacion->detalles()->get();

        if ( $detalles->count() > 1) {
            $ultimoDetalle=$detalles->last();
            $ultimoDetalle->delete();
            $costoTotal = $reparacion->detalles->sum('costo');
            $reparacion->update(['total' => $costoTotal]);

            Session::flash('flash_messageExitoDelete', 'El detalle se eliminó correctamente.');
        }
        else {
            Session::flash('flash_messageAvisoDetalle', '');
        }
        
        $problemas = Problema::get()->sortBy('id_problema');

        return view('Admin.editarDetalle',compact('reparacion','problemas'));
    }

    public function AltaReparacion($id)
    {
        $reparacion = Reparacion::withTrashed()
                    ->find($id);
        $reparacion->restore();

        Session::flash('flash_messageExito', 'La reparación se ha dado de alta correctamente.');
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
        $detalles = $reparacion->detalles()->get();
    	
        return view('Admin.detalleReparacion', compact('reparacion','detalles'));
    }

    public function nuevaReparacion()
    {
        //$cliente=User::withTrashed()->find(1);
        $cliente=null;
        $equipo = null;
        $tipoUsuario = TipoUsuario::find(4);
        $listaClientes = $tipoUsuario->users()->get();
        $listaEquipos = Equipo::get();

        return view('Admin.agregarReparacion',compact('cliente','listaClientes','equipo','listaEquipos'));
    }

    public function guardarReparacion()
    {
        $data = request()->only(['fecha_ingreso','plazo','id_cliente','id_equipo','id_estadoEquipo']);
        
        $fecha = Carbon::createFromFormat('d/m/Y',$data['fecha_ingreso'])->format('Y-m-d');
        
        $reparacion = Reparacion::create([
                'id_usuario' => $data['id_cliente'],   
                'id_equipo' => $data['id_equipo'],
                'id_estado' => $data['id_estadoEquipo'],
                'fecha_ingreso' => $fecha,
                'plazo_estimado' => $data['plazo'],
                'total' => '0'
            ]);

        if ($data['id_estadoEquipo'] == 2) {
            $detalles = Session('detalles');

            foreach ($detalles as $key => $detalle) {
                $detalleReparacion = Detalle::create([
                    'id_reparacion' => $reparacion->id_reparacion,
                    'id_problema' => $detalle['descripcion'],
                    'observacion' => $detalle['observacion'],
                    'costo' => $detalle['costo']
                ]);
            }

            $costoTotal = $detalles->sum('costo');
            $reparacion->update(['total' => $costoTotal]);
            Session()->pull('detalles');
        }
        
        Session::flash('flash_ExitoReparacion', 'La reparación se guardó correctamente.');
        
        return redirect()->route('adminNuevaReparacion');
       
    }

    public function updateReparacion(Reparacion $reparacion)
    {
        $data = request()->all();
        $fecha = Carbon::createFromFormat('d/m/Y',$data['fecha_ingreso'])->format('Y-m-d');
        $fechaHoy = Carbon::now()->format('Y-m-d');
        $detalles = $reparacion->detalles()->get();

        $acumCheck = $reparacion->detalles->sum('realizado');
        $contDetalle = $reparacion->detalles->count();

        if ( $acumCheck == $contDetalle && $reparacion->id_estado != 1 ) {
            $reparacion->update([
                'fecha_ingreso' => $fecha,
                'fecha_egreso' => $fechaHoy,
                'plazo_estimado' => $data['plazo'],
                'id_estado' => 3
            ]);
            
            Session::flash('flash_ReparacionLista', '');
        }

        elseif ( $reparacion->id_estado == 3 ) {
            $reparacion->update([
                'fecha_ingreso' => $fecha,
                'fecha_egreso' => null,
                'plazo_estimado' => $data['plazo'],
                'id_estado' => 2
            ]);
        }

        else {
            $reparacion->update([
                'fecha_ingreso' => $fecha,
                'plazo_estimado' => $data['plazo']
            ]);
        }

        Session::flash('flash_ExitoUpdate', 'La reparación se editó correctamente.');

        return view('Admin.detalleReparacion', compact('reparacion', 'detalles'));
    }
    
    public function editarReparacion(Reparacion $reparacion)
    {
        $cliente = $reparacion->usuario;
        $problemas = Problema::get()->sortBy('id_problema');
        $equipo = $reparacion->equipo;

        if ($reparacion->id_estado == 2) {
            $detalles = $reparacion->detalles;
        }
        return view('Admin.editarReparacion', compact('reparacion','cliente','equipo','detalles','problemas')); 
    }
    
    public function mostrarCliente($id)
    {
        $cliente=User::withTrashed()->find($id);
        return view('Admin.mostrarCliente',compact('cliente'));
    }

    public function tablaCliente()
    {
        $cliente=null;
        $tipoUsuario = TipoUsuario::find(4);
        $listaClientes = $tipoUsuario->users()->get();

        return view('Admin.tablaCliente', compact('listaClientes','cliente'));
    }

    public function nuevoCliente()
    {
        $tipoUser = 4;

        return view('Admin.formularioCliente', compact('tipoUser'));
    }

    public function guardarCliente()
    {
            $validaciones = [
                'nombre' => 'required',
                'apellido' => 'required',
                'dni' => 'required|numeric|digits_between:6,8|unique:users,dni',
                'email' => 'required|email|unique:users,email',
                'password' => '',
                'password_confirmation' => '',
                'tipoUser' => ''
            ];

            $restricciones = [
                'nombre.required' => '* El campo Nombre es obligatorio.',
                'apellido.required' => '* El campo Apellido es obligatorio.',
                'dni.required' => '* El campo DNI es obligatorio.',
                'dni.numeric' => '* El DNI debe ser solo numerico.',
                'dni.digits_between' => '* El número de DNI debe contener entre 6 y 8 dígitos.',
                'dni.unique' => '* Ya existe un usuario registrado con ese DNI.',
                'email.required' => '* El campo Email es obligatorio.',
                'email.email' => '* Debe ingresar un Email válido.',
                'email.unique' => '* Ya existe un usuario registrado con ese EMAIL.',
            ];
        
        $data = request()->validate($validaciones,
        $restricciones);
        
        $data = request()->all();
            User::create([
            'id_tipoUsuario' => 4,   
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            ]);
        

        Session::flash('flash_messageExito', 'El cliente se guardó correctamente.');
        $cliente = null;
        $tipoUsuario = TipoUsuario::find(4);
        $listaClientes = $tipoUsuario->users()->get();
        return redirect()->route('adminNuevaReparacion');
        //return view('Admin.tablaCliente',compact('cliente','listaClientes'));
    }
  
    public function tablaEquipo()
    {
        $equipo = null;
        $listaEquipos = Equipo::get();

        return view('Admin.tablaEquipo', compact('listaEquipos','equipo'));
    }

    public function mostrarEquipo($id)
    {
        $equipo=Equipo::find($id);
        return view('Admin.mostrarEquipo',compact('equipo'));
    }

    public function nuevoEquipo() 
    {
        $equipo = Equipo::get();
        $marcas = Marca::get()->sortBy('id_marca');
        $tiposEquipo = TipoEquipo::get();

        return view('Admin.formularioEquipo', compact('equipo','marcas','tiposEquipo'));
    }

    public function enDiagnostico() 
    {
        return view('Admin.enDiagnostico');
    }

    public function enReparacion() 
    {
        $problemas = Problema::get()->sortBy('id_problema');
        return view('Admin.enReparacion',compact('problemas'));
    }

    public function agregarDetalle($id_reparacion) 
    {
        $problemas = Problema::get()->sortBy('id_problema');
        return view('Admin.agregarDetalle',compact('problemas','id_reparacion'));
    }
  
    public function guardarEquipo()
    {
        $data = request()->all();
            Equipo::create([
                'id_marca' => $data['selectMarca'],
                'id_tipoEquipo' => $data['selectTipo'],
                'modelo' => $data['modelo']
            ]);

        Session::flash('flash_messageExitoEquipo', 'El equipo se guardó correctamente.');

        return redirect()->route('adminNuevaReparacion');
    }

    public function tablaDetalle()
    {
         //Session()->pull('detalles');
        $inputs = request()->all();
        $problema=Problema::find($inputs['descripcion'])->descripcion;
        $detalle = Arr::add($inputs, 'detalleDescripcion',$problema);

        if (session()->has('detalles')) {
            $arrayDetalles = Session('detalles');
            $arrayDetalles->push($detalle);
            Session(['detalles' => $arrayDetalles]);
            // $arrayDetalles->pop();
        }

        else {
            $arrayDetalles = collect([$detalle]);
            Session(['detalles' => $arrayDetalles]);
            // $arrayDetalles = Session('detalles');
        }

        $costoTotal = $arrayDetalles->sum('costo');

        
        // $arrayDetalles = $array->flatten();
        // $arrayDetalles = $array->toArray();
        // $detallesPlano = $arrayDetalles->all();
        // dd($arrayDetalles);

        return view('Admin.tablaDetalle',compact('arrayDetalles','costoTotal'));
    }

    public function quitarUltimo()
    {
        $arrayDetalles = Session('detalles');

        if ($arrayDetalles->count() > 1) {
            $arrayDetalles->pop();
            Session(['detalles' => $arrayDetalles]);
        }
        else {
            $arrayDetalles->pop();
            Session::flash('flash_messageAvisoDetalle', '');
        }

        $costoTotal = $arrayDetalles->sum('costo');

        return view('Admin.tablaDetalle',compact('arrayDetalles','costoTotal'));
    }

    public function updateCheck($id_detalle)
    {
        $detalle = Detalle::find($id_detalle);

        if ($detalle->realizado == 1) {
            $detalle->realizado = 0;
            $detalle->save();

            Session::flash('flash_messageUpdateCheck', 'El estado se actualizó a "Pendiente".');
        }

        else {
            $detalle->realizado = 1;
            $detalle->save();

            Session::flash('flash_messageUpdateCheck', 'El estado se actualizó a "Realizado".');
        }

        $reparacion = Reparacion::find($detalle->id_reparacion);
        $problemas = Problema::get()->sortBy('id_problema');

        $acumCheck = $reparacion->detalles->sum('realizado');
        $contDetalle = $reparacion->detalles->count();

        if ( $acumCheck != $contDetalle && $reparacion->id_estado == 3 ) {
            $reparacion->id_estado = 2;
            $reparacion->save();
        }

        return view('Admin.editarDetalle',compact('reparacion','problemas'));
    }

    // public function editarDetalle()
    // {
    //     return view('Admin.editarDetalle');
    // }

     public function guardarDetalle()
    {
        $inputs = request()->all();
        $detalle = Detalle::create([
                    'id_reparacion' => $inputs['id_reparacion'],
                    'id_problema' => $inputs['descripcion'],
                    'observacion' => $inputs['observacion'],
                    'costo' => $inputs['costo']
                ]);
        $reparacion = Reparacion::find($inputs['id_reparacion']);
        if ($reparacion->id_estado == 1) {
            $reparacion->id_estado = 2;
            $reparacion->save();
        }
        $costoTotal = $reparacion->detalles->sum('costo');
        $reparacion->update(['total' => $costoTotal]);
        $problemas = Problema::get()->sortBy('id_problema');

        Session::flash('flash_messageDetalleGuardado', 'El detalle se agregó correctamente.');

        return view('Admin.editarDetalle',compact('reparacion','problemas'));
    }

    public function guardarFila($id_detalle)
    {
        $detalle = Detalle::find($id_detalle);
        
        $inputs = request()->all();
        $detalle->update([
            'id_problema' => $inputs['descripcion'],
            'observacion' => $inputs['observacion'],
            'costo' => $inputs['costo']
        ]);

        $reparacion = Reparacion::find($detalle->id_reparacion);
        $costoTotal = $reparacion->detalles->sum('costo');
        $reparacion->update(['total' => $costoTotal]);
        $problemas = Problema::get()->sortBy('id_problema');

        Session::flash('flash_messageFilaActualizada', 'Los cambios se guardaron correctamente.');

        return view('Admin.editarDetalle',compact('reparacion','problemas'));
    }

}
