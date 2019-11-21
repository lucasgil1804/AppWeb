@if(!is_null($equipo))
<!-- <div class="card ml-5 mr-5"> -->
  <!-- <div class="card-header"><h4>Datos del Cliente</h4></div> -->
  <div id="datosEquipo" class="card bg-white" style="margin-bottom: 3px;">
  <div class="card-body ">
  	 <div class="" style="display: inline-block;">
  	 	 <h4 class="card-title mb-1">Equipo</h4>
    </div>
    <div class="" style="display: inline-block;float: right;">
      <button  class="btn btn-primary" onclick="EditarEquipo();">
            
            <i class="fa fa-edit"></i>&nbsp; Editar
        </button>
    </div>
  		
  	@php
     sleep(1);
    @endphp	
  <br><p class="card-text ml-2"><strong>Tipo:&nbsp;</strong>{{$equipo->tipoEquipo->descripcion}}.</p>
	<p class="card-text ml-2"><strong>Marca:&nbsp;</strong>{{$equipo->marca->descripcion}}.</p>
  <p class="card-text ml-2"><strong>Modelo:&nbsp;</strong>{{$equipo->modelo}}.</p>
  </div>
</div>
<!-- </div> -->
<script>
    function EditarEquipo(){
      $('#datosEquipo').hide();
      var ruta="http://localhost:8000/tablaEquipo";
      $.ajax({
            type: "GET",
            url: ruta,
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#equipo').fadeIn(1000).html(data);
                $('#loading2').fadeOut(1000);
                $('#containerEquipo').show();
            }

        });
        return false;
  }
</script>
@endif