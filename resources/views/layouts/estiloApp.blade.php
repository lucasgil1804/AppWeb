<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/favicon.ico">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Quick Fix - Corrientes</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('css/linearicons.css')}}">
			<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{asset('css/nice-select.css')}}">							
			<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
			<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
			<link rel="stylesheet" href="{{asset('css/main.css')}}">

		</head>
			<body>	
			  <header id="header" id="home">
		  		<div class="header-top">
		  			<div class="container">
				  		<div class="row">
				  			<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
				  				<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa fa-behance"></i></a></li>
				  				</ul>
				  			</div>
				  			<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
				  				<a href="tel:+953 012 3654 896">+54 379 4448149</a>
				  				<a href="mailto:support@colorlib.com">quickfix.ctes@gmail.com</a>				
				  			</div>
				  		</div>			  					
		  			</div>
				</div>
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="{{ route('inicio') }}"><img src="img/logo.png" alt="" title="Quick Fix" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="{{ route('inicio') }}">Home</a></li>
				          <li><a href="about.html">Quienes somos</a></li>
				          <li><a href="services.html">Servicio</a></li>
				          <li><a href="feedback.html">Feedback</a></li>
				          <li class="menu-has-children"><a href="">Blog</a>
				            <ul>
				              <li><a href="blog-home.html">Blog Home</a></li>
				              <li><a href="blog-single.html">Blog Single</a></li>
				            </ul>
				          </li>						          
			              <li><a href="elements.html">Elements</a></li>				          
				          <li><a href="{{ route('contacto') }}">Contacto</a></li>
				        </ul>
				      </nav>
				      <!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header>

			  	<!-- Inicio area de contenido -->
				<div class="contenidoApp">
				  @yield('contenidoApp')
				 </div>
				 <!-- Fin area de contenido -->

				<!-- start footer Area -->		
				<footer class="footer-area section-gap">
					<div class="container">

						<div class="row footer-bottom d-flex justify-content-between align-items-center">
							<p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Ésta plantilla está diseñada por <a href="https://colorlib.com" target="_blank">F&G Web Design</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
						</div>
					</div>
				</footer>
				<!-- End footer Area -->

				<script src="js/vendor/jquery-2.2.4.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
				<script src="js/vendor/bootstrap.min.js"></script>			
				<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> -->
  				<script src="js/easing.min.js"></script>			
				<script src="js/hoverIntent.js"></script>
				<script src="js/superfish.min.js"></script>	
				<script src="js/mn-accordion.js"></script>
				<script src="js/jquery.ajaxchimp.min.js"></script>
				<script src="js/jquery.magnific-popup.min.js"></script>	
				<script src="js/owl.carousel.min.js"></script>						
				<script src="js/jquery.nice-select.min.js"></script>	
    			<script src="js/jquery.circlechart.js"></script>								
				<script src="js/mail-script.js"></script>	
				<script src="js/main.js"></script>

			</body>
	</html>