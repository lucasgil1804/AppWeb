@extends('layouts.estiloAdmin')

@section('contenidoAdmin')
  <div class="card" style="margin-right: 20px; margin-left: 20px;" >
    
    @if ($tipoUser == 2)
      <div class="card-header"><h3>Nuevo Empleado</h3></div>
    @elseif ($tipoUser == 3)
      <div class="card-header"><h3>Nuevo Técnico</h3></div>
    @else
      <div class="card-header"><h3>Nuevo Cliente</h3></div>
    @endif
    
      <div class="card-body card-block">
          <form action="{{url('nuevoUsuario')}}" method="post" class="needs-validation" novalidate=""> 
    
              {{csrf_field()}}
          	  <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          DNI
                      </div>
                      <input type="text" id="validationCustom01" name="dni" placeholder="Nº de Documento" class="form-control" value="{{ old('dni') }}">
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

              <!-- Si el tipo de usuario es "cliente", el campo de contraseña no se muestra -->
              @if ($tipoUser != 4)
                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-asterisk"></i>
                      </div>
                      <input type="password" id="txtPassword" name="password" placeholder="Contraseña" class="form-control">
                      <div class="input-group-append">
                      <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                    </div>
                  </div>
                  @if ($errors->has('password'))
                    <p class="text-danger small">{{ $errors->first('password') }}</p>
                  @endif
                  </div>
                  <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-asterisk"></i>
                      </div>
                      <input type="password" id="txtPassword2" name="password_confirmation" placeholder="Confirmar Contraseña" class="form-control">
                      <div class="input-group-append">
                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                      </div>
                      
                  </div>
                  @if ($errors->has('password_confirmation'))
                    <p class="text-danger small">{{ $errors->first('password_confirmation') }}</p>
                  @endif
                  </div>
              @endif
              <!-- Si el tipo de usuario es "cliente", el campo de contraseña no se muestra -->

              
              <!-- Campo Oculto -->
               <div class="form-group">
                  <div class="input-group">
                     <input type="hidden" id="tipoUser" name="tipoUser" class="form-control" value="{{$tipoUser}}">
                  </div>
              </div>
              <!-- Campo Oculto -->
              <div class="form-actions form-group">
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i>  
                     &nbsp;Guardar
                  </button>
                  <button type="button" class="btn btn-danger" onclick="location='{{ route('adminListaEmpleados') }}'">
                    <i class="fa fa-times"></i>  
                     &nbsp;Cancelar
                  </button>
              </div>
          </form>
             
          <!-- <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();
          </script> -->


    </div>
</div>                         
@endsection
@section('scripts')

<script type="text/javascript">
  function mostrarPassword(){
    var cambio = document.getElementById("txtPassword");
    var cambio2 = document.getElementById("txtPassword2");

    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }

    if(cambio2.type == "password"){
      cambio2.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio2.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  }

  $(document).ready(function () {
  //CheckBox mostrar contraseña
  $('#ShowPassword').click(function () {
  $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });
  });
</script>

@endsection
