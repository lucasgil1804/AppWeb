@extends('layouts.estiloAdmin')

@section('contenidoAdmin')
  <div class="card" style="margin-right: 20px; margin-left: 20px;" >
    <div class="card-header"><h3>Nuevo Usuario</h3></div>
      <div class="card-body card-block">
          <form action="{{url('nuevoUsuario')}}" method="post" class="needs-validation" novalidate=""> 
              {{csrf_field()}}
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
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-asterisk"></i>
                      </div>
                      <input type="password" id="password" name="password" placeholder="Contraseña" class="form-control">
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
                      <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" class="form-control">
                  </div>
                  @if ($errors->has('password_confirmation'))
                    <p class="text-danger small">{{ $errors->first('password_confirmation') }}</p>
                  @endif
              </div>
              <div class="form-actions form-group">
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i>  
                     &nbsp;Guardar
                  </button>
                  <button type="button" class="btn btn-danger" onclick="location='{{ route('adminListaUsuario') }}'">
                    <i class="fa fa-times"></i>  
                     &nbsp;Cancelar
                  </button>
              </div>
          </form>
    </div>
</div>                         
@endsection
@section('scripts')

@endsection
