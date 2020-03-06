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
<!-- Mensaje se guardo correctamente -->
    @if(Session::has('flash_ExitoReparacion'))
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
            <p>{{Session::get('flash_ExitoReparacion')}}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #ff4000; border-color: white;">Aceptar</button>
        </div>
        </div>
    </div>
    </div>
    @endif 
<!-- Mensaje se guardo correctamente -->    
<div class="container">
	<div class="card bg-light text-dark mt-40">
		<div class="card-header"><h3>Editar Reparación</h3></div>
			<div class="card-body mt-20" align="left">

                <!-- LINK PARA GENERAR PDF -->
                <div align="right">
                    <a href="{{route('customer.printpdf')}}">Generar comprobante</a>
                </div>
                <!-- LINK PARA GENERAR PDF -->

				<!-- <div id="cliente"> -->
         <!-- Campo oculto utilizado para el metodo EnReparacio() -->
          <input id="IdReparacion" type="hidden" value="{{$reparacion->id_reparacion}}" name="">
          <!-- Campo oculto utilizado para el metodo EnReparacio() -->
            <form method="POST" action="{{ url('updateReparacion/'. $reparacion->id_reparacion) }}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

				<div style="display: inline-block; margin-bottom: 15px;">
					<label style="margin-bottom: 5px;"><b>Fecha de Ingreso</b></label>
					
					<!-- INPUT DATEPICKER -->
                	<div class="form-group">
					<div class="input-group date">
                        <input id="fechaIngresoFormulario" type="text" class="form-control" name="fecha_ingreso" value="{{ date('d/m/Y', strtotime($reparacion->fecha_ingreso)) }}" readonly>
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>
                	</div>
					<!-- INPUT DATEPICKER -->

				</div>
				<div style="display: inline-block; float: right; margin-bottom: 15px; width: 7%;">
                    <label style="margin-bottom: 5px;"><b>Plazo</b></label>
					<input id="plazoFormulario" name="plazo" class="form-control" value="{{$reparacion->plazo_estimado}}" min="0" max="30" type="number">
				</div>
  					
				<!-- </div> -->

				<div class="container card bg-light">
					<div id="cliente" class="card-body">
                            <div id="datosCliente" class="card bg-white shadow" style="margin-bottom: 3px;">
                            <div class="card-body ">
                                <div class="" style="display: inline-block;">
                                    <h4 class="card-title mb-1">Cliente</h4>
                                </div>
                                <input type="hidden" name="idcliente" id="idCliente" value="{{$cliente->id_usuario}}">
                                <p class="card-text ml-2"><strong>DNI:&nbsp;</strong>{{$cliente->dni}}</p>
                                <p class="card-text ml-2"><strong>Apellido y Nombre:&nbsp;</strong>{{$cliente->apeYNom()}}</p>
                             </div>
                            </div>  
					</div>
				</div>

				<div class="container card bg-light">
					
				    <div id="equipo" class="card-body">
  						<div id="datosEquipo" class="card bg-white shadow" style="margin-bottom: 3px;">
                            <div class="card-body ">
                                <div class="" style="display: inline-block;">
                                    <h4 class="card-title mb-1">Equipo</h4>
                                </div>
                                <input type="hidden" name="idequipo" id="idEquipo" value="{{$equipo->id_equipo}}">
                                <br><p class="card-text ml-2"><strong>Tipo:&nbsp;</strong>{{$equipo->tipoEquipo->descripcion}}</p>
                                    <p class="card-text ml-2"><strong>Marca:&nbsp;</strong>{{$equipo->marca->descripcion}}</p>
                                <p class="card-text ml-2"><strong>Modelo:&nbsp;</strong>{{$equipo->modelo}}</p>
                            </div>
 						</div>
					</div>
				</div>

				<div class="container card bg-light">
					<div id="detalle" class="card-body">
						
						<div id="containerDetalle" class="container" style="float: left;">
							@if ($reparacion->id_estado == 1)
                                @include('Admin.EnDiagnostico')
                            @else
                                @include('Admin.editarDetalle')
                            @endif
						</div>
 					</div>
				</div>
                 
                     <div align="center">
                     <button type="Submit" class="btn btn-success">
                        <i class="fa fa-save"></i>
                        &nbsp;Guardar
                     </button>
                     <button type="button" class="btn btn-danger" onclick="location='{{route('adminIndex')}}'">
                        <i class="fa fa-times"></i>
                        &nbsp;Cancelar
                     </button>
                     </div>
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
        $('#loading3').hide();
        $('#loading4').hide();
        $('#alerta').hide();
        $('#divIdCliente').hide();
        $('#divIdEquipo').hide();
        $('#divIdEstadoEquipo').hide();
        $('#divFechaIngreso').hide();
        $('#divPlazo').hide();
        $('#validarDetalles').hide();
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
    var IdReparacion=$('#IdReparacion').val();
        var ruta="http://localhost:8000/agregarDetalle/"+IdReparacion;
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
        var idEstado = $('#estadoEquipo').val();
        var fechaIngreso = $('#fechaIngresoFormulario').val();
        var plazo = $('#plazoFormulario').val();  
        if (idCliente == null) {
           $('#alerta').show(); 
           $('#alerta').html("Debe seleccionar un cliente.");
        }
        else if (idEquipo == null){
            $('#alerta').show(); 
            $('#alerta').html("Debe seleccionar un equipo.");
        }
        else if (idEstado == null){
            $('#alerta').show(); 
            $('#alerta').html("Debe seleccionar el estado del equipo.");
        }
        else if ((idEstado == 2) && ($('#inputCantDetalles').val()== 0) )
        {
            $('#inputValidarDetalles').val(null);
            $('#alerta').show(); 
            $('#alerta').html("En el estado En Reparación, debe contener al menos un detalle.");
        }
        else{
            $('#inputValidarDetalles').val(1);
        }

        $('#inputIdCliente').val(idCliente);
        $('#inputIdEquipo').val(idEquipo);
        $('#inputIdEstadoEquipo').val(idEstado);
        $('#inputFechaIngreso').val(fechaIngreso);
        $('#inputPlazo').val(plazo);




    }

</script>
@endsection