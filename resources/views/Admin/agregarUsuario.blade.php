@extends('layouts.estiloAdmin')

@section('contenidoAdmin')
  <div class="card" style="margin-right: 20px; margin-left: 20px;" >
    <div class="card-header">Nuevo Usuario</div>
      <div class="card-body card-block">
          <form action="" method="post" class="">
          	  <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          DNI
                      </div>
                      <input type="text" id="username" name="dni" placeholder="Nº de Documento" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          Apellido
                      </div>
                      <input type="text" id="username" name="apellido" placeholder="Apellido" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          Nombre
                      </div>
                      <input type="text" id="username" name="nombre" placeholder="Nombre" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-envelope"></i>
                      </div>
                      <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-asterisk"></i>
                      </div>
                      <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                  </div>
              </div>
              <div class="form-actions form-group">
                  <button type="submit" class="btn btn-success btn-sm">Submit</button>
              </div>
          </form>
      </div>
  </div>                         
@endsection