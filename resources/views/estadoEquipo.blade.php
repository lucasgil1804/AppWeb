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
								<h3 class="mb-30 mt-20" style="color: grey;">Ingresá tu código</h3>
								<form action="#">
									<!-- <div class="input-group-icon mt-10"> -->
										<!-- <div class="icon"><i class="fa fa-hashtag" aria-hidden="true" style="margin-top: 12px;"></i></div> -->
										
										<div class="input-group" align="center">
											<div class="input-group-prepend">
											<span class="input-group-text">#</span>
											</div>
											<input type="text" name="seguimiento" placeholder="N° de seguimiento" onfocus="this.placeholder = ''" onblur="this.placeholder = 'N° de seguimiento'" required class="form-control" style="line-height:40px;border:none;outline:none;background:#f9f9ff;padding:0 20px;">

										<!-- <div class="icon"><i class="fa fa-minus" aria-hidden="true" style="margin-top: 12px;"></i></div> -->
											<div class="input-group-prepend">
												<span class="input-group-text">/</span>
											</div>
											<input type="text" name="seguimiento2" required class="form-control" style="line-height:40px;border:none;outline:none;background:#f9f9ff;padding:0 20px;">
										</div>

										<div class="button-group-area mt-40">
											<a href="#" class="genric-btn danger circle arrow">Consultar<span class="lnr lnr-arrow-right"></span></a>
										</div>
								</form>
							</div>
					</div>

			</div>

@endsection