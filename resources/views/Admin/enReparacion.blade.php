<div id="loading4" align="center">
    <img src="img/ajax-loader.gif" alt="loading" height="5%" width="5%" />
    <br/>Cargando...
</div>
@php
  sleep(1);
@endphp 
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
  <div class="mt-3 container">
    
    <div id="demo" class="mt-3 alert alert-info">
      <p style="font-size: 16px; margin-bottom: 15px;">En ésta sección se deberá cargar al menos <b>un detalle</b> de la reparación.</p>
  
    <form method="post" class="was-validated"> 
    
              {{csrf_field()}}
              <div class="form-group">
                  <div class="input-group form-inline">
                      <label style="width: 15%;">
                          <b>Descripción</b>&nbsp;
                      </label>
                      <!-- <input type="text" id="descripcion" name="descripcion" placeholder="" class="form-control" value="" required> -->
                      <select name="selectDescripcion" id="descripcion" class="form-control custom-select" required>
                          <option value="">Por favor, seleccione un problema</option>
                          @foreach ($problemas as $descripcion)
                            <option value="{{ $descripcion->id_problema }}">{{ $descripcion->descripcion }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group form-inline">
                      <label style="width: 15%;">
                          <b>Observación</b>&nbsp;
                      </label>
                      <textarea class="form-control" rows="3" id="observacion" name="observacion" required></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group form-inline">
                      <label style="width: 15%;">
                          <b>Costo&nbsp;$</b>&nbsp;
                      </label>
                      <div style="width: 10%;">
                        <input type="number" step="0.5" min="0" id="costo" name="costo" placeholder="" class="form-control" value="0.0" required>
                     </div>
                  </div>
              </div>
                            
              <div class="form-actions form-group">
                  <button type="button" class="btn btn-success" onclick="guardarDetalle();">
                    <i class="fa fa-save"></i>  
                     &nbsp;Guardar
                  </button>
                  <button type="button" class="btn btn-danger" onclick="Cancelar();">
                    <i class="fa fa-times"></i>  
                     &nbsp;Cancelar
                  </button>
              </div>
          </form>
      </div>
  </div>
<script type="text/javascript">
    function guardarDetalle(){
    $('#loading4').show();
        var ruta="http://localhost:8000/tablaDetalle";
        $.ajax({
            type: "GET",
            url: ruta,
            data: "descripcion="+$('#descripcion').val()+"&observacion="+$('#observacion').val()+"&costo="+$('#costo').val(),
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#detalle').fadeIn(1000).html(data);
                $('#containerDetalle').hide();
                $('#loading4').fadeOut(1500);
            }

        });
        return false;
    }

    function NuevoDetalle(){
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
</script>