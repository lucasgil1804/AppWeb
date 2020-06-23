<div id="loading4" align="center">
    <img src="{{asset('img/ajax-loader.gif')}}" alt="loading" height="5%" width="5%" />
    <br/>Cargando...
</div>



<h4 class="card-title">Detalle</h4>
  <div class="dropdown" style="display: inline-block;">
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
  <div style="display: inline-block; float: right;">
      <button type="button" class="btn btn-primary" onclick="NuevoDetalle();">
          <!-- <a class="linkBlanco" href=""> -->
          <i class="fa fa-plus"></i>&nbsp; Añadir
      </button>
      @if ($arrayDetalles->isEmpty())
        <button type="button" disabled class="btn btn-secondary" title="La tabla debe contener al menos un detalle" onclick="QuitarUltimo();">
          <i class="fa fa-times"></i>&nbsp; Quitar
        </button>
      @else
        <button type="button" class="btn btn-primary" title="Quitar último elemento" onclick="QuitarUltimo();">
          <i class="fa fa-times"></i>&nbsp; Quitar
        </button>
      @endif
      </div>

      @if(Session::has('flash_messageAvisoDetalle'))
        <div class="alert alert-info alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <p>El estado <b>En Reparación</b> debe contener al menos un detalle. Si no desea guardar detalles, cambie el estado a <b>En Diagnóstico</b>.</p>
        </div>
      @endif

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
        @foreach($arrayDetalles as $detalles)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $detalles["detalleDescripcion"] }}</td>
            <td>{{ $detalles["observacion"] }}</td>
            <td>{{ $detalles["costo"] }}</td>
          </tr>
        @endforeach
  		</tbody>
  		<tfoot>
  			<tr>
  				<th colspan="3" style="color: black; text-align: right;">Total: $</th>
  				<th style="color: black;">{{ $costoTotal }}</th>
  			</tr>
  		</tfoot>
	</table>
  <div id="divCantidadDetalles" class="form-group">
    <input type="text" name="cantDetalles" class="form-control" id="inputCantDetalles" value="{{Session('detalles')->count()}}">
  </div> 
 </div>

 <script type="text/javascript">
  $(document).ready(function(){
    $('#divCantidadDetalles').hide();
  });
   function QuitarUltimo(){
    $('#loading4').show();
        var ruta="quitarUltimoDetalle";
        $.ajax({
            type: "GET",
            url: ruta,
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#detalle').fadeIn(1000).html(data);
                // $('#containerDetalle').hide();
                $('#loading4').fadeOut(1500);
            }

        });
        return false;
    }
 </script>