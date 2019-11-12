@extends('layouts.estiloAdmin')

@section('contenidoAdmin')
<div id="cliente">
	<div id="loading">
		<img src="img/ajax-loader.gif" alt="loading" />
		<br/>Cargando...
	</div>
  @include('Admin.mostrarCliente')	
</div>
<div id="containerCliente" class="container" style="height:300px;width:500px; ">
  <h2>Clientes</h2>
  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
  <br>
  <div class="table-responsive table-hover" style="height:200px;">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>      </th>
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