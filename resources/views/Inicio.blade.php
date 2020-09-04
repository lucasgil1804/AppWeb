@extends('layouts.estiloApp')

@section('contenidoApp')

	<!-- start banner Area -->
		<section class="banner-area" id="home">
			<div class="container">
				<div class="row fullscreen d-flex align-items-center">
					<div class="banner-content col-lg-7 col-md-6 justify-content-center "> 
						<h6 class="text-uppercase">Somos lo que buscás.</h6>

						<h1>
							TODAS LAS COSAS NECESITAN REPARARSE			
						</h1>
						<p class="text-white">
							Somos una empresa que se caracteriza porque no descansa hasta encontrar la solución a tu problema. Con atención personalizada en el menor lapso de tiempo..
						</p>
						<a href="{{ route('estadoEquipo') }}" class="primary-btn header-btn text-uppercase mt-10">Consultar</a>
					</div>	
						<div class="banner-img col-lg-5 col-md-6 align-self-end">
							<img class="img-fluid" src="img/banner-img.png" alt="">
						</div>											
				</div>
			</div>

		</section>
	<!-- End banner Area -->

	<!-- Start service Area -->
		<section class="service-area section-gap" id="service">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12 pb-50 header-text text-center">
						<h1 class="mb-10">Lo que te ofrecemos</h1>
						<p>
							Diagnóstico preciso y los mejores presupuestos.
						</p>
					</div>
				</div>						
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-service">
								<div class="thumb">
									<img src="img/o1.jpg" alt="">									
								</div>
								<h4>Reparación de Notebooks</h4>
								<p>
									Reparamos todo tipo de defectos y fallas en Notebooks.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-service">
								<div class="thumb">
									<img src="img/o2.jpg" alt="">									
								</div>
								<h4>Reparación de PC's de escritorio</h4>
								<p>
									Realizamos todo tipo de reparaciónes relacionados con hardware en PC's de escritorio.								
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-service">
								<div class="thumb">
									<img src="img/o3.jpg" alt="">									
								</div>
								<h4>Reparación de PC's All in One</h4>
								<p>
									Reparamos todo tipo de defectos y fallas en PC's All in One.
								</p>
							</div>
						</div>	
						<div class="col-lg-3 col-md-6">
							<div class="single-service">
								<div class="thumb">
									<img src="img/o4.jpg" alt="">									
								</div>
								<h4>Reparamos todas las marcas</h4>
								<p>
									Reparamos todas las marcas tales como Lenovo, HP, Sony, Acer y muchas más.
								</p>
							</div>
						</div>																		
					</div>
			</div>	
		</section>
	<!-- End service Area -->
			
	<!-- Start home-about Area -->
		<section class="home-about-area section-gap relative">			
			<div class="container">
				<div class="row align-items-center justify-content-start">
					<div class="col-lg-6 no-padding home-about-right">
						<h1>
							Podemos reparar todo tipo <br>
							de computadoras
						</h1>
						<p>
							Contamos con el mejor equipo técnico y herramientas de primera mano para una solución óptima.
						</p>
						<div class="row no-gutters">
							<div class="single-services col">
								<span class="lnr lnr-graduation-hat"></span>
								<a href="#">
									<h4>Servicio Experto</h4>
								</a>
								<p>
									Especialistas en cada tema para <br>
									una mejor atención.
								</p>
							</div>
							<div class="single-services col">
								<span class="lnr lnr-phone"></span>
								<a href="#">
									<h4>Soporte</h4>
								</a>
								<p>
									Ante cualquier duda, podes comunicarte con nosotros a través del formulario de contacto, por mail o via telefónica.
								</p>
							</div>								
						</div>
					</div>
				</div>
			</div>	
		</section>
	<!-- End home-about Area -->

			
	<!-- Start work-process Area -->
	<div class="col-12 col-lg-7 col-sm-7 mx-auto" style="padding-top: 120px;">
		<!-- <div class="menu-content pb-60 col-lg-7"> -->
			<div class="title text-center">
				<h1 class="mb-10">Nuestro Proceso de trabajo</h1>
				<p>Nos capacitamos continuamente para ofrecerte un servicio de calidad, confiable y seguro; acompañado de los mejores profesionales.</p>
			</div>
		<!-- </div> -->
	</div>
		<section class="work-process-area pb-120">

			<div class="container">	
				<div class="total-work-process d-flex flex-wrap justify-content-around align-items-center">
					<div class="single-work-process">
						<div class="work-icon-box">
							<span class="lnr lnr-warning"></span>
						</div>
						<h4 class="caption">Detectar el problema</h4>
					</div>
					<div class="work-arrow">
						<img src="img/arrow.png" alt="">
					</div>
					<div class="single-work-process">
						<div class="work-icon-box">
							<span class="lnr lnr-layers"></span>
						</div>
						<h4 class="caption">Dividirlo en partes</h4>
					</div>
					<div class="work-arrow">
						<img src="img/arrow.png" alt="">
					</div>
					<div class="single-work-process">
						<div class="work-icon-box">
							<span class="lnr lnr-magnifier"></span>
						</div>
						<h4 class="caption">Definir la solución</h4>
					</div>
					<div class="work-arrow">
						<img src="img/arrow.png" alt="">
					</div>
					<div class="single-work-process">
						<div class="work-icon-box">
							<span class="lnr lnr-smile"></span>
						</div>
						<h4 class="caption">Clientes satisfechos</h4>
					</div>											
				<div class="row">
					<div class="col"></div>
				</div>
			</div>
			</div>	
		</section>
	<!-- End work-process Area -->

@endsection