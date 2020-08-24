@extends('layouts.estiloAdmin')

@section('contenidoAdmin')

@if(Session::has('flash_ReparacionLista'))
  <div class="alert alert-success alert-dismissible mr-3 ml-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><b>¡ El equipo se encuentra reparado !</b></p>
  </div>
@endif

<div class="container">
<div class="card bg-light text-dark mt-40">
<!-- CONTENIDO-DETALLE REPARACION -->
	<div class="card-header"><h3>Detalle de la Reparación</h3></div>
	<div class="card-body mt-20" align="left">

    @if(Session::has('flash_ExitoUpdate'))
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Registro Exitoso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>{{Session::get('flash_ExitoUpdate')}}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #ff4000; border-color: white;">Aceptar</button>
        </div>
        </div>
    </div>
    </div>
    @endif 

		<div class="row">
			<h4 class="col card-title">Cliente: {{ $reparacion->usuario->nombre. " " .$reparacion->usuario->apellido }}</h4>
			@if ( $reparacion->id_estado == 3 )
				<h4 class=" col card-text">Ingreso: {{ date("d/m/Y", strtotime($reparacion->fecha_ingreso)). " - Egreso: " .date("d/m/Y", strtotime($reparacion->fecha_egreso))}}</h4>
			@else
				<h4 class=" col card-text">Ingreso: {{ date("d/m/Y", strtotime($reparacion->fecha_ingreso)) }}</h4>
			@endif
		</div>
		<div class="row">
			<h4 class="col card-title">DNI: {{ $reparacion->usuario->dni }}</h4>
			<h4 class=" col card-text">Plazo: {{ $reparacion->plazo_estimado }} días</h4>
		</div>

    @if( $reparacion->deleted_at != NULL )
      <div class="row">
        <div class="col card-title">
          Estado del Equipo:    
          <button type="button" class="btn btn-danger btn-sm" data-toggle="collapse" data-target="#demo"><h4 style="color: #f5f5f0;">Anulado &nbsp;<i class="fa fa-chevron-down"></i></h4>
          </button>
            </div>
            <h5 class="col card-text mt-1" style="color: black;">{{ $reparacion->equipo->marca->descripcion }} - {{ $reparacion->equipo->modelo }}</h5>
          </div>
       
          <div id="demo" class="mt-3 collapse alert alert-danger">
            <p><strong><b style="color: red; font-size: 16px;">Reparación Anulada</b></strong></p>
        <p style="font-size: 16px;">Para visualizar el detalle, debe Dar de Alta la reparación.</p><br>
        <p style="font-size: 16px;"><strong>Fecha de anulación:</strong> {{ date("d/m/Y", strtotime($reparacion->deleted_at)) }} </p>
          </div>

		@elseif( $reparacion->id_estado == 1 )

			<div class="row">
				<div class="col card-title">
					Estado del Equipo:	  
					<button type="button" class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#demo"><h4 style="color: #f5f5f0;">En Diagnóstico &nbsp;<i class="fa fa-chevron-down"></i></h4>
          </button>
        		</div>
        		<h5 class="col card-text mt-1" style="color: black;">{{ $reparacion->equipo->marca->descripcion }} - {{ $reparacion->equipo->modelo }}</h5>
        	</div>
       
       		<div id="demo" class="mt-3 collapse alert alert-warning">
       			<p><strong><b style="color: #BA8B00; font-size: 16px;">Estamos Trabajando:</b></strong></p>
				<p style="font-size: 16px;">Se está revisando su equipo para detectar el problema. Por favor, consulte mas tarde.</p>
  	  		</div>

  	  	@elseif( $reparacion->id_estado == 2 )

   			<div class="row">
        		<div class="col card-title">
  	  				Estado del Equipo:	  
        			<button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo"><h4 style="color: #f5f5f0;">En Reparación &nbsp;<i class="fa fa-chevron-down"></i></h4>
              </button>
        		</div>
        		<h5 class="col card-text mt-1" style="color: black;">{{ $reparacion->equipo->marca->descripcion }} - {{ $reparacion->equipo->modelo }}</h5>
        	</div>

        	<div id="demo" class="mt-3 collapse alert alert-info">
       			<p><strong><b style="color: #0066ff; font-size: 16px;">Estamos Trabajando:</b></strong></p>
				<p style="font-size: 16px;">En éste momento, tu equipo está siendo reparado.</p><br>
        <div class="table-responsive">
				<table class="table table-hover">
  					<thead>
    					<tr align="center">
      						<th scope="col" style="color: black;">#</th>
      						<th scope="col" style="color: black;">Descripción</th>
      						<th scope="col" style="color: black;">Observación</th>
      						<th scope="col" style="color: black;">Realizado</th>
      						<th scope="col" style="color: black;">Costo</th>
    					</tr>
  					</thead>
  					<tbody>
  						@foreach ($detalles as $detalleReparacion)
  	  						<tr align="center">
      							<th scope="row" style="color: black;">{{ $loop->iteration }}</th>
      							<td style="color: black;">{{ $detalleReparacion->problema->descripcion }}</td>
      							<td style="color: black;">{{ $detalleReparacion->observacion }}</td>
      							@if ( $detalleReparacion->realizado == 1 )
                      <td align="center"><i style="color: green;" class="fa fa-check-circle" data-toggle="tooltip" data-placement="top" title="Realizado"></i></td>
      							@else
                      <td align="center"><i style="color: red;" class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Pendiente"></i></td>
      							@endif
    								<td style="color: black;">${{ $detalleReparacion->costo }}</td>
    						</tr>
  						@endforeach
  					</tbody>
  					<tfoot>
  						<tr>
  							<th colspan="4" style="color: black; text-align: right;">Total: </th>
  							<th style="color: black;">${{ $reparacion->total }}</th>
  						</tr>
  					</tfoot>
				</table>
      </div>
  	  		</div>

  	  	@else

  	  		<div class="row">
        		<div class="col card-title">
        			Estado del Equipo:	  
        			<button type="button" class="btn btn-success btn-sm" data-toggle="collapse" data-target="#demo"><h4 style="color: #f5f5f0;">Listo &nbsp;<i class="fa fa-chevron-down"></i></h4>
              </button>
        		</div>
        		<h5 class="col card-text mt-1" style="color: black;">{{ $reparacion->equipo->marca->descripcion }} - {{ $reparacion->equipo->modelo }}</h5>
        	</div>

        <div id="demo" class="mt-3 collapse alert alert-success">
       		<p><strong><b style="color: #009933; font-size: 16px;">¡Su equipo se encuentra reparado!</b></strong></p>

        <div class="table-responsive">
			   <table class="table table-hover">
  				<thead>
    				<tr align="center">
      					<th scope="col" style="color: black;">#</th>
      					<th scope="col" style="color: black;">Descripción</th>
      					<th scope="col" style="color: black;">Observación</th>
      					<th scope="col" style="color: black;">Realizado</th>
      					<th scope="col" style="color: black;">Costo</th>
    				</tr>
  				</thead>
  				<tbody>
  					@foreach ($detalles as $detalleReparacion)
  	  					<tr align="center">
      						<th scope="row" style="color: black;">{{ $loop->iteration }}</th>
      							<td style="color: black;">{{ $detalleReparacion->problema->descripcion }}</td>
      							<td style="color: black;">{{ $detalleReparacion->observacion }}</td>
      							@if ( $detalleReparacion->realizado == 1 )
      								<td align="center"><i style="color: green;" class="fa fa-check-circle" data-toggle="tooltip" data-placement="top" title="Realizado"></i></td>
      							@else
      								<td align="center"><i style="color: red;" class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Pendiente"></i></td>
      							@endif
    							<td style="color: black;">${{ $detalleReparacion->costo }}</td>
    					</tr>
  					@endforeach
  				</tbody>
  			<tfoot>
  				<tr>
  					<th colspan="4" style="color: black; text-align: right;">Total: </th>
  					<th style="color: black;">${{ $reparacion->total }}</th>
  				</tr>
  			</tfoot>
			</table>
    </div>
  	  	</div>

  	  	@endif
  
  	</div>
<!-- CONTENIDO-DETALLE REPARACION -->
</div>
</div>
@endsection

@section('scripts')
<script>
  $("#myModal").modal('show');
</script>

	<script>
		$(document).ready(function(){
  		$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>
@endsection