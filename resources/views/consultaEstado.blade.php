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
    											<h4 class="col card-title">{{ $reparacion->usuario->nombre. " " .$reparacion->usuario->apellido }}</h5>
    											<h4 class=" col card-text">Ingreso: {{ date("d/m/Y", strtotime($reparacion->fecha_ingreso)) }}</h4>
        									</div>
        									<div class="row">
    											<h4 class="col card-title">{{ $reparacion->usuario->dni }}</h4>
    											<h4 class=" col card-text">Plazo: {{ $reparacion->plazo_estimado }}</h4>
        									</div>

   											@if( $reparacion->id_estado == 1 )
   												<div class="progress mt-30 mb-30" style="height:12px">
    											<div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" 	                        style="width:33%;height:12px"></div>
   												</div>

        										<div class="mt-3 mb-20">Estado del Equipo:	  
        											<button type="button" class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#demo"><h6>En Diagnóstico</h6></button>
        										</div>
       
  	   
       											<div id="demo" class="mt-3 collapse alert alert-warning">
       												<p><strong><b style="color: #BA8B00;">Estamos Trabajando:</b></strong></p>
													<p>Se está revisando su equipo para detectar el problema. Por favor, consulte mas tarde.</p>
  	  											</div>

  	  										@elseif( $reparacion->id_estado == 2 )
  	  											<div class="progress mt-30 mb-30" style="height:12px">
    											<div class="progress-bar bg-info progress-bar-striped progress-bar-animated" 	                        style="width:66%;height:12px"></div>
   												</div>

  	  											<div class="mt-3 mb-20">Estado del Equipo:	  
        											<button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo"><h6>En Reparación</h6></button>
        										</div>

        										<div id="demo" class="mt-3 collapse alert alert-info">
       												<p><strong><b>Estamos Trabajando:</b></strong></p>
													
  	  											</div>

  	  										@else
  	  											<div class="progress mt-30 mb-30" style="height:12px">
    											<div class="progress-bar bg-check progress-bar-striped progress-bar-animated" 	                        style="width:100%;height:12px"></div>
   												</div>

  	  											<div class="mt-3 mb-20">Estado del Equipo:	  
        											<button type="button" class="btn btn-check btn-sm" data-toggle="collapse" data-target="#demo"><h6>Listo</h6></button>
        										</div>

        										<div id="demo" class="mt-3 collapse alert alert-check">
       												<p><strong><b">¡Su equipo se encuentra reparado!</b></strong></p>
													
  	  											</div>

  	  										@endif
  
  										</div>
  									<!-- @foreach ($detalles as $detalleReparacion)
  									@endforeach -->
  									<!-- CONTENIDO-DETALLE REPARACION -->

								</div>
							</div>

				<!-- </div> -->
			</div>

@endsection