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
      <button type="button" value="{{$reparacion->id_reparacion}}" class="btn btn-primary" onclick="NuevoDetalle(this);">
          <!-- <a class="linkBlanco" href=""> -->
          <i class="fa fa-plus"></i>&nbsp; Añadir
      </button>
      @if ($reparacion->detalles->isEmpty())
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

      @if(Session::has('flash_messageUpdateCheck'))
        <div class="alert alert-info alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <p>{{ Session::get('flash_messageUpdateCheck') }}</p>
        </div>
      @endif

  <div class="mt-3 alert alert-info">
 	<table class="table table-hover">
  		<thead>
    		<tr>
      		<th scope="col" style="color: black;">#</th>
      		<th scope="col" style="color: black;">Descripción</th>
      		<th scope="col" style="color: black;">Observación</th>
          <th scope="col" style="color: black;">Realizado</th>
      		<th scope="col" style="color: black;">Costo</th>
    		</tr>
  		</thead>
  		<tbody>
        @foreach($reparacion->detalles as $detalle)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $detalle->problema->descripcion }}</td>
            <td>{{ $detalle->observacion }}</td>
            @if ( $detalle->realizado == 1 )
              <td align="center">
                <label class="switch switch-text switch-success switch-pill">
                      <input type="checkbox" class="switch-input" id="checkRealizado" value="{{ $detalle->id_detalleReparacion }}" onclick="DetalleRealizado(this);" checked="true">
                      <span data-on="SI" data-off="NO" class="switch-label"></span>
                      <span class="switch-handle"></span>
                    </label>
              </td>
            @else
              <td align="center">
                      <label class="switch switch-text switch-success switch-pill"> 
                      <input type="checkbox" class="switch-input" id="checkRealizado" value="{{ $detalle->id_detalleReparacion }}" onclick="DetalleRealizado(this);">
                      <span data-on="SI" data-off="NO" class="switch-label"></span>
                      <span class="switch-handle"></span>
                    </label>
              </td>
            @endif

            <td>{{ $detalle->costo }}</td>
          </tr>
        @endforeach
  		</tbody>
  		<tfoot>
  			<tr>
  				<th colspan="4" style="color: black; text-align: right;">Total: $</th>
  				<th style="color: black;">{{ $reparacion->total }}</th>
  			</tr>
  		</tfoot>
	</table>
   
 <script type="text/javascript">
  $(document).ready(function(){
    //$('#loading4').hide();
    $('#divCantidadDetalles').hide();
  });
 function QuitarUltimo(){
    $('#loading4').show();
        var ruta="http://localhost:8000/quitarUltimoDetalle";
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
    function DetalleRealizado(btn){
       $('#loading4').show();
        var ruta="http://localhost:8000/updateCheck/"+btn.value;
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
  function NuevoDetalle(btn){
    $('#loading4').show();
        var ruta="http://localhost:8000/agregarDetalle/"+btn.value;
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