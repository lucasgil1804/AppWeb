<div id="loading3" align="center">
    <img src="{{asset('img/ajax-loader.gif')}}" alt="loading" height="5%" width="5%" />
    <br/>Cargando...
</div>
@php
  sleep(1);
@endphp 
<h4 class="card-title">Detalle</h4>
  <div class="dropdown">
      <input type="hidden" id="estadoEquipo" name="estado_equipo" value="1">
  		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
   			En Diagnóstico
  		</button>
  		<div class="dropdown-menu">
    		<button type="button"  class="dropdown-item" onclick="enReparacion();">
          En Reparación
        </button>
  		</div>
	</div>
  <div class="mt-3 alert alert-warning">
    <p style="font-size: 16px;">El equipo se encuentra en diagóstico y deberá ser revisado por un técnico para determinar una solución.</p>
  </div>
