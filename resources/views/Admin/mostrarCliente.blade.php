@if(!is_null($cliente))
<div class="card ml-5 mr-5">
  <!-- <div class="card-header"><h4>Datos del Cliente</h4></div> -->
  <div class="card-body ">
  	 <div class="" style="display: inline-block;">
  	 	 <h4 class="card-title mb-1">Cliente</h4>
    </div>
    <div class="" style="display: inline-block;float: right;">
      <button  class="btn btn-primary" onclick="Editar();">
            
            <i class="fa fa-edit"></i>&nbsp; Editar
        </button>
    </div>
  		
  	@php
     sleep(1);
    @endphp	
    <p class="card-text ml-2"><strong>DNI:&nbsp;</strong>{{$cliente->dni}}.</p>
	<p class="card-text ml-2"><strong>Apellido y Nombre:&nbsp;</strong>{{$cliente->apeYNom()}}.</p>
  </div>
</div>
<script>
    function Editar(){
    $('#cliente').hide();
    $('#containerCliente').show();
  }
</script>
@endif
	
