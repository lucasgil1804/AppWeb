<h4 class="card-title">Detalle</h4>
  <div class="dropdown">
      <input type="hidden" id="estadoEquipo" name="estado_equipo" value="2">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        En Reparación
      </button>
      <div class="dropdown-menu">
        <button type="button" class="dropdown-item" onclick="enDiagnostico();">
          En Diagnóstico
        </button>
      </div>
  </div>
  <div class="mt-3 alert alert-info">
 	<table class="table table-hover">
  		<thead>
    		<tr>
      		<th scope="col" style="color: black;">#</th>
      		<th scope="col" style="color: black;">Descripción</th>
      		<th scope="col" style="color: black;">Observación</th>
      		<th scope="col" style="color: black;">Costo</th>
    		</tr>
  		</thead>
  		<tbody>
  	  		<tr>
  	  			<td>1</td>
  	  			<td>{{$detalles['descripcion']}}</td>
  	  			<td>{{$detalles['observacion']}}</td>
  	  			<td>{{$detalles['costo']}}</td>
  	  		</tr>	
  		</tbody>
  		<tfoot>
  			<tr>
  				<th colspan="3" style="color: black; text-align: right;">Total: $</th>
  				<th style="color: black;">{{$detalles['costo']}}</th>
  			</tr>
  		</tfoot>
	</table> 
 </div>