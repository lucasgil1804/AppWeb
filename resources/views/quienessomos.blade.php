@extends('layouts.estiloApp')

<title>Quick Fix - Quiénes Somos</title>
@section('contenidoApp')

			<!-- start banner Area -->
			<section class="banner-area relative" id="home" style="background-image: url('../img/banner-otro.jpg');">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Quiénes Somos				
							</h1>	
							<p class="text-white link-nav"><a href="{{ route('inicio') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('quienessomos') }}"> Quiénes Somos</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border text-right">
						<h3 class="mb-30">Quick Fix - Reparación de PC y Notebook</h3>
						<div class="row">
							<div class="col-md-9">
								<p class="text-right">Somos una empresa pequeña pero con grandes aspiraciones, surgida en el año 2018 de la mano de Juan Cruz Fernandez y Lucas Sebastian Gil, en la provincia de Corrientes. Dos jovenes emprendedores que quisieron innovar y mejorar la interacción del cliente con el local, y a la vez, ahorrar que tenga que presentarse en el mismo varias veces, pudiendo consultar el estado de su equipo desde su casa a travéz de un CÓDIGO DE SEGUIMIENTO del equipo.</p> <br><br>
								<p class="text-right">Pretendemos ofrecerte el mejor servicio y ahorrar tu tiempo, que sabemos que es valioso para ti.</p>
							</div>
							<div class="col-md-3">
								<img src="img/elements/d1.jpg" alt="" class="img-fluid">
							</div>
						</div>
					</div>

					<div class="section-top-border">
						<h3 class="mb-30">Información Adicional</h3>
						<div class="row">
							<div class="col-md-4">
								<div class="single-defination">
									<h4 class="mb-20">Si queres conocer más...</h4>
									<p>Podes conocer nuestro local de calle San Martín 1524<br>
									Horarios de atención: Lun-Vie: 8:00 a 13:00 hs y 17:00 a 21:00 hs<br>
									O comunicarte con nosotros a travéz de la sección de Contacto</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="single-defination">
									<h4 class="mb-20">¡Encontranos en las redes!</h4>
									<p><img src="img/icons/facebook.png" width="30px" height="30px" style="margin-right: 10px;"> quickfix-corrientes<br><br>
									<img src="img/icons/instagram.png" width="30px" height="30px" style="margin-right: 10px;"> quickfix-corrientes<br><br>
									<img src="img/icons/whatsapp.png" width="30px" height="30px" style="margin-right: 10px;"> 379-4338053/379-4922873</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="single-defination">
									<h4 class="mb-20">Formas de Pago</h4>
									<p>Aceptamos todas las tarjetas hasta en 3 y 6 cuotas sin interés<br><img src="img/icons/tarjetas.jpg" width="200px" height="60px" style="margin-left: 50px;"><br>
									¡Y ahora aceptamos Mercado Pago!<img src="img/icons/mercadopago.png" width="30px" height="30px" style="margin-left: 10px;"></p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
				
@endsection