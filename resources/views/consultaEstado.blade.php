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
    								<div class="card-body mt-20" align="left">
     									<div class="row">
    										<h5 class="col card-title">Fernandez Juan Cruz</h5>
    										<p class=" col card-text">Fecha: 17/10/2019.</p>
        								</div>
        								<div class="row">
    										<h5 class="col card-title">Datos..</h5>
    										<p class=" col card-text">Datos..</p>
        								</div>
        								<div class="progress mt-30 mb-30" style="height:12px">
    										<div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" 	                        style="width:30%;height:12px"></div>

   										</div>
        
        								<div class="mt-3 mb-20">Estado del Equipo:	  
        									<button type="button" class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#demo">En 								Diagnóstico</button>
        								</div>
       
  	   
       									<div id="demo" class="mt-3 collapse alert alert-warning">
       										<p><strong><b style="color: #BA8B00;">Estamos Trabajando:</b></strong></p>
											<p>Se está revisando su equipo para detectar el problema. Por favor, consulte mas tarde.</p>
  	  									</div>
  
  									</div>

								</div>
							</div>

				<!-- </div> -->
			</div>

@endsection