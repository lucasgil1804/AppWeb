<div id="formularioEquipo" class="container">

<h4 class="card-title">Nuevo Equipo</h4>

@php
  sleep(1);
@endphp 

<!-- VERIFICAR VALORES DEL FORMULARIO -->
<form action="{{ url('guardarEquipo') }}" method="post" class="was-validated"> 
    
              {{csrf_field()}}
          	  <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          Tipo
                      </div>
                      <select name="selectTipo" id="selectTipo" class="form-control custom-select" required>
                          <option value="">Por favor, seleccione un tipo</option>
                          @foreach ($tiposEquipo as $tipo)
                            <option value="{{ $tipo->id_tipoEquipo }}">{{ $tipo->descripcion }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          Marca
                      </div>
                      <select name="selectMarca" id="selectMarca" class="form-control custom-select" required>
                          <option value="">Por favor, seleccione una marca</option>
                          @foreach ($marcas as $marca)
                            <option value="{{ $marca->id_marca }}">{{ $marca->descripcion }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          Modelo
                      </div>
                     <input type="text" id="modelo" name="modelo" placeholder="Modelo del equipo" class="form-control" value="" required>
                  </div>
              </div>
                            
              <div class="form-actions form-group">
                  <button type="submit" class="btn btn-success">
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

<script>
    function Cancelar(){
      $('#formularioEquipo').hide();
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