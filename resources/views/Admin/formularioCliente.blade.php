<div id="formularioCliente" class="container">

<h4 class="card-title">Nuevo Cliente</h4>

@php
  sleep(1);
@endphp 
<form action="{{url('guardarCliente')}}" method="post" novalidate=""> 
    
              {{csrf_field()}}
          	  <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          DNI
                      </div>
                      <input type="text" id="validationCustom01" name="dni" placeholder="Nº de Documento" class="form-control" value="{{ old('dni') }}" required pattern="[0-9]{7,8}" title="Ingrese un dni valido">
                     <!--  <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field.</div> -->
                     <!--  <input type="text" id="validationCustom01" name="dni" placeholder="Nº de Documento" class="form-control" required pattern="[0-9]{7,8}" title="Ingrese solo números."> -->
                  </div>
                  @if ($errors->has('dni'))
                    <p class="text-danger small">{{ $errors->first('dni') }}</p>
                  @endif
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          Apellido
                      </div>
                      <!-- <input type="text" id="username" name="apellido" placeholder="Apellido" class="form-control" required> -->
                      <input type="text" id="userapellido" name="apellido" placeholder="Apellido" class="form-control" value="{{ old('apellido') }}">
                     <!--  <div class="invalid-feedback">
                         Por favor, ingrese el Apellido. 
                      </div> -->
                  </div>
                  @if ($errors->has('apellido'))
                    <p class="text-danger small">{{ $errors->first('apellido') }}</p>
                  @endif
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          Nombre
                      </div>
                     <!--  <input type="text" id="username" name="nombre" placeholder="Nombre" class="form-control" required> -->
                     <input type="text" id="username" name="nombre" placeholder="Nombre" class="form-control" value="{{ old('nombre') }}">
                     <!--  <div class="invalid-feedback">
                         Por favor, ingrese el Nombre. 
                      </div> -->
                  </div>
                  @if ($errors->has('nombre'))
                    <p class="text-danger small">{{ $errors->first('nombre') }}</p>
                  @endif
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-envelope"></i>
                      </div>
                      <!-- <input type="email" id="email" name="email" placeholder="Email" class="form-control" required=""> -->
                      <input type="text" id="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                      <!-- <div class="invalid-feedback">
                         *Este campo es obligatorio.
                         Por favor, ingrese un Email valido. 
                      </div> -->
                  </div>
                  @if ($errors->has('email'))
                    <p class="text-danger small">{{ $errors->first('email') }}</p>
                  @endif
              </div>
              
              <!-- <div class="form-actions form-group"> -->
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i>  
                     &nbsp;Guardar
                  </button>
                  <button type="button" class="btn btn-danger" onclick="Cancelar();">
                    <i class="fa fa-times"></i>  
                     &nbsp;Cancelar
                  </button>
              <!-- </div> -->
          </form>
</div>

<script>
    function Cancelar(){
     // $('#formularioCliente').hide();
      var ruta="http://localhost:8000/tablaCliente";
      $.ajax({
            type: "GET",
            url: ruta,
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#cliente').fadeIn(1000).html(data);
                $('#loading').fadeOut(1000);
                $('#containerCliente').show();
            }

        });
        return false;
  }
</script>