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
<!-- Mensaje el cliente se guardo correctamente -->
	@if(Session::has('flash_messageExito'))
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Registro Exitoso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>{{Session::get('flash_messageExito')}}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #ff4000; border-color: white;">Aceptar</button>
        </div>
        </div>
    </div>
    </div>
    @endif 
<!-- Mensaje el cliente se guardo correctamente -->    
<div class="container">
	<div class="card bg-light text-dark mt-40">
		<div class="card-header"><h3>Nueva Reparación</h3></div>
			<div class="card-body mt-20" align="left">

				<!-- <div id="cliente"> -->
				
				<div style="display: inline-block; margin-bottom: 15px;">
					<label style="margin-bottom: 5px;"><b>Fecha de Ingreso</b></label>
					
					<!-- INPUT DATEPICKER -->
                	<div class="form-group">
					<div class="input-group date">
                        <input type="text" class="form-control" name="date" readonly>
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>
                	</div>
					<!-- INPUT DATEPICKER -->

				</div>
				<div style="display: inline-block; float: right; margin-bottom: 15px; width: 7%;">
					<label style="margin-bottom: 5px;"><b>Plazo</b></label>
					<input class="form-control" value="0" min="0" max="30" type="number" placeholder="">
				</div>
  					
				<!-- </div> -->

				<div class="container card bg-light">
					
					<div id="cliente" class="card-body">
						
						<div id="containerCliente" class="container" style="float: left;">
  						@if ($errors->any())
  							@include('Admin.formularioCliente')
  						@else
  							@include('Admin.tablaCliente')
  						@endif
 						</div>				

					</div>
				</div>

				<div class="container card bg-light">
					
					<div id="equipo" class="card-body">
						
						<div id="containerEquipo" class="container" style="float: left;">
  							@include('Admin.tablaEquipo')
 						</div>
					</div>
				</div>

				<div class="container card bg-light">
					<div id="detalle" class="card-body">
						
						<div id="containerDetalle" class="container" style="float: left;">
							<h4 class="card-title">Detalle</h4>
  							<div class="dropdown">
  								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
   							 		Estado del Equipo
  								</button>
  								<div class="dropdown-menu">
    								<button type="button" class="dropdown-item" onclick="enDiagnostico();">
                                    En diagnóstico
                                    </button>
    								<div class="dropdown-divider"></div>
    								<button type="button" class="dropdown-item" onclick="enReparacion();">
                                    En Reparación
                                    </button>
  								</div>
							</div>
 						</div>
					</div>
				</div>
                <form action="">
                     <div id="alerta" class="alert alert-danger alert-dismissible">
                        
                    </div>
                     <div id="divIdCliente" class="form-group">
                         <input type="text" class="form-control" id="inputIdCliente" required>
                     </div>
                     <div id="divIdEquipo" class="form-group">
                          <input type="hidden" class="form-control" id="inputIdEquipo" required>
                     </div>
                     <button type="button" class="btn btn-primary" onclick="EnviarFormulario();">Submit</button>
                </form>

				
				
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
<script>
	$("#myModal").modal('show');
</script>
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

	$(document).ready(function(){
		
		$('#loading2').hide();
        $('#alerta').hide();
        $('#divIdCliente').hide();
        $('#divIdEquipo').hide();
		$("#buscarEquipo").on("keyup", function() {
    	var value = $(this).val().toLowerCase();
   			 $("#myTableEquipo tr").filter(function() {
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

	function MostrarEquipo(btn){
		// $('#cliente').html('<div id="cliente" class="loading"><img src="img/ajax-loader.gif" alt="loading" /><br/>Cargando...</div>');
		//$('#cliente').show();
    $('#loading2').show();
		var ruta="http://localhost:8000/mostrarEquipo/"+btn.value;
		$.ajax({
            type: "GET",
            url: ruta,
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#equipo').fadeIn(1000).html(data);
                $('#containerEquipo').hide();
            }

        });
        return false;
		// $('#cliente').load(ruta); 
	}

	function NuevoCliente(){
	$('#loading').show();
		var ruta="http://localhost:8000/formularioCliente/4";
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
	}

	function NuevoEquipo(){
	$('#loading2').show();
		var ruta="http://localhost:8000/formularioEquipo";
		$.ajax({
            type: "GET",
            url: ruta,
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#equipo').fadeIn(1000).html(data);
                $('#containerEquipo').hide();
            }

        });
        return false;
	}

    function enDiagnostico(){
    $('#loading3').show();
        var ruta="http://localhost:8000/enDiagnostico";
        $.ajax({
            type: "GET",
            url: ruta,
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#detalle').fadeIn(1000).html(data);
                $('#containerDetalle').hide();
                $('#loading3').fadeOut(1500);
            }

        });
        return false;
    }

    function enReparacion(){
    $('#loading4').show();
        var ruta="http://localhost:8000/enReparacion";
        $.ajax({
            type: "GET",
            url: ruta,
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#detalle').fadeIn(1000).html(data);
                $('#containerDetalle').hide();
                $('#loading4').fadeOut(1500);
            }

        });
        return false;
    }

    function EnviarFormulario(){
        var idCliente = $('#idCliente').val();
        var idEquipo = $('#idEquipo').val();
        if (idCliente == null) {
           $('#alerta').show(); 
           $('#alerta').html("Debe seleccionar un cliente.");
        }
        else if (idEquipo == null){
            $('#alerta').show(); 
            $('#alerta').html("Debe seleccionar un equipo.");
        }
        $('#inputIdCliente').val(idCliente);
        $('#inputIdEquipo').val(idEquipo);


    }

</script>
@endsection