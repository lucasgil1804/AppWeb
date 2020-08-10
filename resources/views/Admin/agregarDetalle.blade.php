<!-- Se utiliza en la vista editarReparacion -->
<h4 class="card-title">Detalle</h4>
  <div class="mt-3 container">
    
    <div id="demo" class="mt-3 alert alert-info">
      <p style="font-size: 16px; margin-bottom: 15px;">En ésta sección se deberá cargar al menos <b>un detalle</b> de la reparación.</p>
  
    <form method="get" class="was-validated"> 
    
              {{csrf_field()}}
              <input type="hidden" name="id_reparacion" id="id_reparacion" value="{{$id_reparacion}}">
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
                   <p  id="errorDescripcion"style="margin-left: 15%;" class="text-danger small invisible"  >*Debe selecionar un problema</p>
              </div>

              <div class="form-group">
                  <div class="input-group form-inline">
                      <label style="width: 15%;">
                          <b>Observación</b>&nbsp;
                      </label>
                      <textarea class="form-control" rows="3" id="observacion" name="observacion"></textarea>
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
                            
              <div class="form-actions form-group mt-3" align="center">
                  <button type="button" class="btn btn-success" onclick="guardarDetalle();">
                    <i class="fa fa-arrow-circle-up"></i>  
                     &nbsp;Cargar Detalle
                  </button>
              </div>
          </form>
      </div>
  </div>
<script type="text/javascript">
    function guardarDetalle(){
    $('#loading4').show();
     if ($('#descripcion').val() == "") {

      $('#errorDescripcion').attr('class', 'text-danger small');
      return false;
     }
        var ruta="/guardarDetalle";
        $.ajax({
            type: "GET",
            url: ruta,
            data: "descripcion="+$('#descripcion').val()+"&observacion="+$('#observacion').val()+"&costo="+$('#costo').val()+"&id_reparacion="+$('#id_reparacion').val(),
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