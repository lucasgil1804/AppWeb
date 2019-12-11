@extends('layouts.estiloApp')
	
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->

<title>Quick Fix - Estado de mi Equipo</title>	
@section('contenidoApp')

			<!-- start banner Area -->
			<section class="banner-area relative" id="home" style="background-image: url('../img/banner-otro.jpg');">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Estado de mi Equipo				
							</h1>	
							<p class="text-white link-nav"><a href="{{ route('inicio') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('estadoEquipo') }}"> Estado de mi Equipo</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<div class="container" align="center">
				<!-- <div class="section-top-border"> -->
							<div class="col-lg-9 col-md-9 mt-40 mb-40">
								<h1>¿Ya está listo mi equipo?</h1>
								
								<div class="card bg-light text-dark mt-40">
									<!-- CONTENIDO-DETALLE REPARACION -->
    									<div class="card-body mt-20" align="left">
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

   											@if( $reparacion->id_estado == 1 )
   												<div class="progress mt-30 mb-30" style="height:12px">
    											<div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" 	                        style="width:33%;height:12px"></div>
   												</div>

        										<div class="row">
        											<div class="col card-title">
        												Estado del Equipo:	  
        												<button type="button" class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#demo"><h4 style="color: #f5f5f0;">En Diagnóstico</h4></button>
        											</div>
        											<h5 class="col card-text mt-1" style="color: black;">{{ $reparacion->equipo->marca->descripcion }} - {{ $reparacion->equipo->modelo }}</h5>
        										</div>
       
       											<div id="demo" class="mt-3 collapse alert alert-warning">
       												<p><strong><b style="color: #BA8B00; font-size: 16px;">Estamos Trabajando:</b></strong></p>
													<p style="font-size: 16px;">Se está revisando su equipo para detectar el problema. Por favor, consulte mas tarde.</p>
  	  											</div>

  	  										@elseif( $reparacion->id_estado == 2 )
  	  											<div class="progress mt-30 mb-30" style="height:12px">
    											<div class="progress-bar bg-info progress-bar-striped progress-bar-animated" 	                        style="width:66%;height:12px"></div>
   												</div>

   												<div class="row">
        											<div class="col card-title">
  	  													Estado del Equipo:	  
        												<button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo"><h4 style="color: #f5f5f0;">En Reparación</h4></button>
        											</div>
        											<h5 class="col card-text mt-1" style="color: black;">{{ $reparacion->equipo->marca->descripcion }} - {{ $reparacion->equipo->modelo }}</h5>
        										</div>

        										<div id="demo" class="mt-3 collapse alert alert-info">
       												<p><strong><b style="color: #0066ff; font-size: 16px;">Estamos Trabajando:</b></strong></p>
													<p style="font-size: 16px;">En éste momento, tu equipo está siendo reparado.</p>
													<br>
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

  	  										@else
  	  											<div class="progress mt-30 mb-30" style="height:12px">
    											<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" 	                        style="width:100%;height:12px"></div>
   												</div>

  	  											<div class="row">
        											<div class="col card-title">
        												Estado del Equipo:	  
        												<button type="button" class="btn btn-success btn-sm" data-toggle="collapse" data-target="#demo"><h4 style="color: #f5f5f0;">Listo</h4></button>
        											</div>
        											<h5 class="col card-text mt-1" style="color: black;">{{ $reparacion->equipo->marca->descripcion }} - {{ $reparacion->equipo->modelo }}</h5>
        										</div>

        										<div id="demo" class="mt-3 collapse alert alert-success">
       												<p><strong><b style="color: #009933; font-size: 16px;">¡Su equipo se encuentra reparado!</b></strong></p>
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
      															<td align="center"><i style="color: green; float: center;" class="fa fa-check-circle" data-toggle="tooltip" data-placement="top" title="Realizado"></i></td>
      														@else
      															<td><i style="color: red; float: center;" class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Pendiente"></i></td>
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

  	  										@endif
  
  										</div>
  									<!-- CONTENIDO-DETALLE REPARACION -->

								</div>
							</div>

				<!-- </div> -->
			</div>

@endsection

@section('scripts')
	<script>
		$(document).ready(function(){
  		$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>
@endsection