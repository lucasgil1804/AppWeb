@extends('layouts.estiloApp')
	
<title>Quick Fix - Reparación de Notebook</title>	
@section('contenidoApp')

			<!-- start banner Area -->
			<section class="banner-area relative" id="home" style="background-image: url('../img/banner-otro.jpg');">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Reparación de Notebook			
							</h1>	
							<p class="text-white link-nav"><a href="{{ route('inicio') }}">Home</a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('reparacionNotebook') }}"> Reparación de Notebook</a></p>
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
						<h3 class="mb-30">Notebooks</h3>
						<div class="row">
							<div class="col-md-3">
								<img src="{{asset('img/elements/notebook.jpg')}}" alt="Notebook" class="img-fluid">
							</div>
							<div class="col-md-9 mt-sm-20 left-align-p">
								<p align="justify">Quick Fix cuenta con todo para darle el más completo servicio de reparación de notebook. Sabemos de tecnología, y entendemos la gran importancia que ésta tiene en el día a día, tanto para el cliente como para una empresa; es por eso que nuestro servicio de reparación le asegura la mayor eficiencia en el menor tiempo posible.</p>
								<p align="justify">El servicio técnico de computadoras de Quick  Fix se caracteriza por abarcar cualquier tipo de problemática que presenten sus equipos, trabajando de manera conjunta y multidisciplinaria para lograr los mejores resultados. Contamos con un plantel de técnicos muy bien formados y actualizados en lo último en tecnología para efectuar un service de computadoras de primer nivel.</p>
								<p align="justify">Consideramos que Quick Fix es su mejor opción para el arreglo de notebooks y netbooks que aspiren a recuperar el 100% de su rendimiento.</p>
							</div>
						</div>
					</div>
					<h3 class="text-uppercase mb-30 mt-30">Repuestos Destacados</h3>
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="" src="img/elements/cambioPantalla.jpg" alt="Pantalla" width="200px" height="200px">
								<h5 class="text-uppercase mb-2">Pantallas</h5>
								<p>
									Contamos con laboratorio propio y un equipo altamente especializado en la reparación de pantallas.
								</p>
							</div>								
						</div>
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="" src="img/elements/teclado.jpg" alt="Teclado" width="200px" height="200px">
								<h5 class="text-uppercase mb-2">Teclados</h5>
								<p>
									Servicio técnico de teclados de notebook. Encuentre en nosotros su mejor opción para su notebook.
								</p>
							</div>								
						</div>
						<div class="col-lg-4">
							<div class="single-feedback">
								<img class="" src="img/elements/bateria.jpg" alt="Bateria" width="200px" height="200px">
								<h5 class="text-uppercase mb-2">Baterias</h5>
								<p>
									Venta de baterías de todas las marcas. Solicite asesoramiento y nuestros expertos lo ayudarán para brindarle la mejor solución.
								</p>
							</div>								
						</div>	
					</div>
					<div class="section-top-border">
						<h3 class="mb-30">Lo que te podemos ofrecer:</h3>
						<div class="row">
							<div class="col-md-4">
								<div class="single-defination">
									<img  align="left" src="img/icons/clean-repair.png" width="30px" height="30px" style="margin-right: 10px;">
									<h4 class="mb-20" align="justify">Limpieza del Equipo</h4>
									<p align="justify">Configuramos tus equipos para que brinden el mayor rendimiento dentro de sus posibilidades técnicas.Eliminando todo tipo de virus, programas innecesarios, archivos temporales, configurando el Equipo para un inicio rápido y seguro.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="single-defination">
									<img align="left" src="img/icons/pc-mechanic.png" width="30px" height="30px" style="margin-right: 10px;">
									<h4 class="mb-20">Cambio de Partes del Equipo</h4>
									<p align="justify">Cambiamos las partes rotas del Equipo: Teclados, Discos Rígidos, Pantallas, Fuentes, MotherBoards.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="single-defination">
									<img  align="left" src="img/icons/pay.png" width="30px" height="30px" style="margin-right: 10px;">
									<h4 class="mb-20">Presupuestos por la reparación del Equipo</h4>
									<p align="justify">Hacemos presupuestos por la reparación o instalación que necesites antes de comenzar a trabajar. Todos cuentan con garantía para que pruebes que quedó funcionando correctamente.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="section-top-border">
						<h3>Reparamos Todas Las Marcas Y Modelos</h3>
						<div class="row gallery-item">
							<div class="col-md-3">
								<a href="img/elements/hp.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/hp.jpg);"></div></a>
							</div>
							<div class="col-md-3">
								<a href="img/elements/acer.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/acer.jpg);"></div></a>
							</div>
							<div class="col-md-3">
								<a href="img/elements/asus.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/asus.jpg);"></div></a>
							</div>
							<div class="col-md-3">
								<a href="img/elements/lenovo.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/lenovo.jpg);"></div></a>
							</div>
							<div class="col-md-3">
								<a href="img/elements/dell.png" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/dell.png);"></div></a>
							</div>
							<div class="col-md-3">
								<a href="img/elements/vaio.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/vaio.jpg);"></div></a>
							</div>
							<div class="col-md-3">
								<a href="img/elements/bangho.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/bangho.jpg);"></div></a>
							</div>
							<div class="col-md-3">
								<a href="img/elements/apple.jpg" class="img-gal"><div class="single-gallery-image" style="background: url(img/elements/apple.jpg);"></div></a>
							</div>
						</div>
					</div>
				</div>
@endsection