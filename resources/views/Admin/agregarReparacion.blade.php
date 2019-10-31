@extends('layouts.estiloAdmin')

@section('contenidoAdmin')
<div id="cliente">
  @include('Admin.mostrarCliente')	
</div>
<button  id="agregarcliente" value="1" onclick="Mostrar(this);"><i class="fa fa-plus-circle text-success"></i></button>




@endsection

@section('scripts')
	
<script>
	$(document).ready(function(){
		$('#cliente').hide();
	});
	
	function Mostrar(btn){
	
		$('#cliente').show();
		var ruta="http://localhost:8000/mostrarCliente/"+btn.value;
		$('#cliente').load(ruta);

	}
	

</script>
@endsection