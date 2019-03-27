@extends('layouts.estiloApp')
	
<title>Quick Fix - Reparación de PC</title>	
@section('contenidoApp')

			<!-- start banner Area -->
			<section class="banner-area relative" id="home" style="background-image: url('../img/banner-otro.jpg');">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Reparación de PC			
							</h1>	
							<p class="text-white link-nav"><a href="{{ route('inicio') }}">Home</a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('reparacionPC') }}"> Reparación de PC</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<!-- Start Align Area -->
			<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
						<h3 class="mb-30">PC's De Escritorio y All In One</h3>
						<div class="row">
							<div class="col-md-3">
								<img src="{{asset('img/elements/gabinete.jpg')}}" alt="" class="img-fluid">
							</div>
							<div class="col-md-9 mt-sm-20 left-align-p">
								<p align="justify">Quick Fix cuenta con todo para darle el más completo servicio de reparación de computadoras. Sabemos de tecnología, y entendemos la gran importancia que ésta tiene en el día a día, tanto para el cliente como para una empresa; es por eso que nuestro servicio de reparación le asegura la mayor eficiencia en el menor tiempo posible.</p>
								<p align="justify">El servicio técnico de computadoras de Quick  Fix se caracteriza por abarcar cualquier tipo de problemática que presenten sus equipos, trabajando de manera conjunta y multidisciplinaria para lograr los mejores resultados. Contamos con un plantel de técnicos muy bien formados y actualizados en lo último en tecnología para efectuar un service de computadoras de primer nivel.</p>
								<p align="justify">Consideramos que Quick Fix es su mejor opción para el arreglo de computadoras que aspiren a recuperar el 100% de su rendimiento.</p>
							</div>
						</div>
					</div>
					<div class="section-top-border">
						<h3>Image Gallery</h3>
						<div class="row gallery-item">
							<div class="col-md-4">
								<a href="img/elements/g1.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/g1.jpg);"></div></a>
							</div>
							<div class="col-md-4">
								<a href="img/elements/g2.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/g2.jpg);"></div></a>
							</div>
							<div class="col-md-4">
								<a href="img/elements/g3.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/g3.jpg);"></div></a>
							</div>
							<div class="col-md-6">
								<a href="img/elements/g4.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/g4.jpg);"></div></a>
							</div>
							<div class="col-md-6">
								<a href="img/elements/g5.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/g5.jpg);"></div></a>
							</div>
							<div class="col-md-4">
								<a href="img/elements/g6.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/g6.jpg);"></div></a>
							</div>
							<div class="col-md-4">
								<a href="img/elements/g7.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/g7.jpg);"></div></a>
							</div>
							<div class="col-md-4">
								<a href="img/elements/g8.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/g8.jpg);"></div></a>
							</div>
						</div>
					</div>
				</div>
@endsection