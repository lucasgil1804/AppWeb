@extends('layouts.estiloAdmin')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

@section('contenidoAdmin')
  <div class="card" style="margin-right: 20px; margin-left: 20px;" >
    <div class="card-header"><h3>Editar {{ $user->tipoUsuario->descripcion }}</h3></div>
      <div class="card-body card-block">

          <form method="post" class="needs-validation" novalidate="" action="{{ url('editarUsuario/'. $user->id_usuario) }}">

              {{ method_field('PUT') }}
              {{ csrf_field() }}
         @if ($errors->has('password'))
          <div class="alert alert-danger">
            <p style="color: #800000;"><b>Ha ocurrido un error al cambiar la clave.</b></p>
          </div>
         @endif  

          	  <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          DNI
                      </div>
                      <input type="text" id="validationCustom01" name="dni" placeholder="Nº de Documento" class="form-control" value="{{ old('dni',$user->dni) }}">
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
                      <input type="text" id="username" name="apellido" placeholder="Apellido" class="form-control" value="{{ old('apellido',$user->apellido) }}">
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
                     <input type="text" id="username" name="nombre" placeholder="Nombre" class="form-control" value="{{ old('nombre',$user->nombre) }}">
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
                      <input type="text" id="email" name="email" placeholder="Email" class="form-control" value="{{ old('email',$user->email) }}">
                  </div>
                  @if ($errors->has('email'))
                    <p class="text-danger small">{{ $errors->first('email') }}</p>
                  @endif
              </div>

              <!-- Campo Oculto -->
           
                  <div class="input-group">
                     <input type="hidden" id="tipoUser" name="tipoUser" class="form-control" value="{{ old('id_tipoUsuario',$user->id_tipoUsuario) }}">
                  </div>
            
              <!-- Campo Oculto -->
              
              @if($user->id_tipoUsuario != 4)
                <button type="button" class="btn btn-link mb-2" data-toggle="collapse" data-target="#demo"><i class="fa fa-key"></i> Cambiar clave
                </button>
              @endif
                <div id="demo" class="collapse">
                  
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

                </div>

              <div class="form-actions form-group">
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i>  
                     &nbsp;Guardar
                  </button>
                  @if ($user->id_tipoUsuario == 2)
                  <button type="button" class="btn btn-danger" onclick="location='{{ route('adminListaEmpleados') }}'">
                    <i class="fa fa-times"></i>  
                     &nbsp;Cancelar
                  </button>
                  @elseif ($user->id_tipoUsuario == 3)
                  <button type="button" class="btn btn-danger" onclick="location='{{ route('adminListaTecnicos') }}'">
                    <i class="fa fa-times"></i>  
                     &nbsp;Cancelar
                  </button>
                  @elseif ($user->id_tipoUsuario == 1)
                   <button type="button" class="btn btn-danger" onclick="location='{{ route('adminIndex') }}'">
                    <i class="fa fa-times"></i>  
                     &nbsp;Cancelar
                  </button>
                  @else
                  <button type="button" class="btn btn-danger" onclick="location='{{ route('adminListaClientes') }}'">
                    <i class="fa fa-times"></i>  
                     &nbsp;Cancelar
                  </button>
                  @endif
              </div>
          </form>
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
