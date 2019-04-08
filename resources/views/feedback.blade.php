@extends('layouts.estiloApp')
	
<title>Quick Fix - Feedback</title>	
@section('contenidoApp')

			<!-- start banner Area -->
			<section class="banner-area relative" id="home" style="background-image: url('../img/banner-otro.jpg');">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Feedback				
							</h1>	
							<p class="text-white link-nav"><a href="{{ route('inicio') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('feedback') }}"> Feedback</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<section class="feedback-area-area pt-120">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="imgRedonda" src="img/t1.jpg" alt="">
								<p>
									Buena atención y predisposición para solucionar mi problema.
								</p>
								<a href="#">
									<h5 class="text-uppercase">José Luis Alarcón</h5>
								</a>
							</div>								
						</div>
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="imgRedonda" src="img/t2.jpg" alt="">
								<p>
									¡No descansan hasta arreglar tu equipo! Muy buena atención.
								</p>
								<a href="#">
									<h5 class="text-uppercase">Mauricio Leclerc</h5>
								</a>
							</div>								
						</div>
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="imgRedonda" src="img/t3.jpg" alt="">
								<p>
									Tomó un tiempo que resuelvan mi problema pero al final estoy conforme.
								</p>
								<a href="#">
									<h5 class="text-uppercase">Ayelén Pori</h5>
								</a>
							</div>								
						</div>	
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="imgRedonda" src="img/t4.jpg" alt="">
								<p>
									No sé que le habrán hecho a mi notebook, ¡pero quedó perfecta!
								</p>
								<a href="#">
									<h5 class="text-uppercase">Adrián Encinas</h5>
								</a>
							</div>								
						</div>
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="imgRedonda" src="img/t5.jpg" alt="">
								<p>
									Estuve un tiempo esperando un repuesto, pero una vez que llegó.. quedó muy bien.
								</p>
								<a href="#">
									<h5 class="text-uppercase">Belén Chavez</h5>
								</a>
							</div>								
						</div>
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="imgRedonda" src="img/t6.jpg" alt="">
								<p>
									Poder consultar el estado de mi equipo desde mi casa ¡ES LO MÁS!
								</p>
								<a href="#">
									<h5 class="text-uppercase">Maximiliano Cabral</h5>
								</a>
							</div>								
						</div>	
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="imgRedonda" src="img/t7.jpg" alt="">
								<p>
									Precios accesibles y buena atención. Ninguna queja.
								</p>
								<a href="#">
									<h5 class="text-uppercase">Camila Prósperi</h5>
								</a>
							</div>								
						</div>
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="imgRedonda" src="img/t8.jpg" alt="">
								<p>
									Les llevó un tiempo la solución pero quedó bien.
								</p>
								<a href="#">
									<h5 class="text-uppercase">José Manuel Alonso</h5>
								</a>
							</div>								
						</div>
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="imgRedonda" src="img/t9.jpg" alt="">
								<p>
									Llegué por recomendación de un amigo, y quedé conforme con el servicio.
								</p>
								<a href="#">
									<h5 class="text-uppercase">Federico Alegre</h5>
								</a>
							</div>								
						</div>																													
					</div>
				</div>
			</section>

@endsection