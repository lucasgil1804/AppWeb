@extends('layouts.estiloApp')
	
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
				<div class="section-top-border">
							<div class="col-lg-9 col-md-9">
								<h1>¿Ya está listo mi equipo?</h1>
								
							</div>
					</div>

			</div>

@endsection