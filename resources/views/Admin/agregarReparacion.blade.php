@extends('layouts.estiloAdmin')

<!-- ESTILO DATEPICKER STYDE -->

    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>

<!-- ESTILO DATEPICKER STYDE -->

@section('contenidoAdmin')
<div class="container">
	<div class="card bg-light text-dark mt-40">
		<div class="card-header"><h3>Detalle de la Reparación</h3></div>
			<div class="card-body mt-20" align="left">

				<div id="cliente">
				<div id="loading">
					<img src="img/ajax-loader.gif" alt="loading" />
					<br/>Cargando...
				</div>
				<div style="display: inline-block; margin-bottom: 15px;">
					<label style="margin-bottom: 5px;"><b>Fecha de Ingreso</b></label>
					
					<!-- INPUT DATEPICKER -->
                	<div class="form-group">
					<div class="input-group date">
                        <input type="text" class="form-control" name="date">
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>
                	</div>
					<!-- INPUT DATEPICKER -->

				</div>
				<div style="display: inline-block; float: right; margin-bottom: 15px; width: 7%;">
					<label style="margin-bottom: 5px;"><b>Plazo</b></label>
					<input class="form-control" type="number" placeholder="">
				</div>
  				@include('Admin.mostrarCliente')	
				</div>

				<div class="card bg-light">
					
					<div class="card-body">
						<h4 class="card-title">Cliente</h4>
						<div id="containerCliente" class="container" style="float: left;">
  						<div style="display: inline-block; margin-bottom: 15px;">
  							<input class="form-control" id="myInput" type="text" placeholder="Buscar...">
  						</div>
  						<div style="display: inline-block; float: right; margin-bottom: 15px;">
        					<button type="button" class="btn btn-primary">
            				<a class="linkBlanco" href="#">
            				<i class="fa fa-plus"></i>&nbsp; Añadir</a>
            				</button>
    					</div>
  						<br>
  						<div class="table-responsive" style="height:150px;">
  							<table class="table table-hover bg-white">
    							<thead>
      								<tr>
        								<th>     </th>
        								<th>Dni</th>
        								<th>Apellido</th>
        								<th>Nombre</th>
      								</tr>
    							</thead>
    						<tbody id="myTable">
      						@foreach($listaClientes as $client)
      							<tr>
      								<td>
      								<button  id="agregarcliente" value="{{$client->id_usuario}}" onclick="Mostrar(this);">
      								<i class="fa fa-plus-circle text-success"></i>
      								</button>
      								</td>
        							<td>{{$client->dni}}</td>
        							<td>{{$client->apellido}}</td>
       	 							<td>{{$client->nombre}}</td>
       							</tr>
      						@endforeach
    						</tbody>
  							</table>
 						</div>
 						</div>
					</div>
				</div>
 			</div>
	</div>
</div>

<!-- SCRIPT DATEPICKER -->
<script>
	$('.input-group.date').datepicker({
    language: "es",
    daysOfWeekDisabled: "0",
    autoclose: true,
    todayHighlight: true
	});

	$('.input-group.date').datepicker("setDate", new Date());
</script>
<!-- SCRIPT DATEPICKER -->
@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){
		
		$('#loading').hide();
		$("#myInput").on("keyup", function() {
    	var value = $(this).val().toLowerCase();
   			 $("#myTable tr").filter(function() {
      			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    		});
 		});

	});
	
	function Mostrar(btn){
		// $('#cliente').html('<div id="cliente" class="loading"><img src="img/ajax-loader.gif" alt="loading" /><br/>Cargando...</div>');
		//$('#cliente').show();
		$('#loading').show();
		var ruta="http://localhost:8000/mostrarCliente/"+btn.value;
		$.ajax({
            type: "GET",
            url: ruta,
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#cliente').fadeIn(1000).html(data);
                $('#containerCliente').hide();
            }

        });
        return false;
		// $('#cliente').load(ruta); 
	}
</script>
@endsection