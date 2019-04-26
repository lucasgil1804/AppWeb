@extends('layouts.estiloAdmin')

@section('contenidoAdmin')
  <div class="card" style="margin-right: 20px; margin-left: 20px;" >
    <div class="card-header">Nuevo Usuario</div>
      <div class="card-body card-block">
          <form action="" method="post" class="needs-validation" novalidate>
          	  <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          DNI
                      </div>
                      <input type="text" id="validationCustom01" name="dni" placeholder="Nº de Documento" class="form-control" required pattern="[0-9]{7,8}" title="Ingrese solo números.">
                      <div class="invalid-feedback">
                         *Este campo es obligatorio.
                         Por favor, ingrese un numero de DNI valido. 
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          Apellido
                      </div>
                      <input type="text" id="username" name="apellido" placeholder="Apellido" class="form-control" required>
                      <div class="invalid-feedback">
                         Por favor, ingrese el Apellido. 
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          Nombre
                      </div>
                      <input type="text" id="username" name="nombre" placeholder="Nombre" class="form-control" required>
                      <div class="invalid-feedback">
                         Por favor, ingrese el Nombre. 
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-envelope"></i>
                      </div>
                      <input type="email" id="email" name="email" placeholder="Email" class="form-control" required="">
                      <div class="invalid-feedback">
                         *Este campo es obligatorio.
                         Por favor, ingrese un Email valido. 
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-asterisk"></i>
                      </div>
                      <input type="password" id="password" name="password" placeholder="Contraseña" class="form-control" required="">
                      <div class="invalid-feedback">
                         Por favor, ingrese la contraseña. 
                      </div>
                  </div>
              </div>
               <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-asterisk"></i>
                      </div>
                      <input type="password" id="confirmpassword" name="comfirmpassword" placeholder="Confirmar Contraseña" class="form-control" required="">
                      <div class="invalid-feedback">
                         Por favor, confirme la contraseña. 
                      </div>
                  </div>
              </div>
              <div class="form-actions form-group">
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i>  
                     &nbsp;Guardar
                  </button>
                  <button type="button" class="btn btn-danger">
                    <i class="fa fa-times"></i>  
                     &nbsp;Cancelar
                  </button>
              </div>
          </form>
          <script>
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
          </script>
    </div>
</div>                         
@endsection