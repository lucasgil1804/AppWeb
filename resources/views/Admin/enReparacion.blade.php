<div id="loading4" align="center">
    <img src="img/ajax-loader.gif" alt="loading" height="5%" width="5%" />
    <br/>Cargando...
</div>
@php
  sleep(1);
@endphp 
<h4 class="card-title">Detalle</h4>
  <div class="dropdown">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        En Reparacíon
      </button>
      <div class="dropdown-menu">
        <button type="button" class="dropdown-item" onclick="enDiagnostico();">
          En Diagnóstico
        </button>
      </div>
  </div>
  <div class="mt-3 container">
    
    <p style="font-size: 16px;">En ésta sección se deberá cargar al menos un detalle de la reparación. </p>
    <form action="" method="post" class="was-validated"> 
    
              {{csrf_field()}}
              <div class="form-group">
                  <div class="input-group form-inline">
                      <div class="input-group">
                          Descripción&nbsp;
                      </div>
                      <input type="text" id="" name="" placeholder="Modelo del equipo" class="form-control" value="" required>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group form-inline">
                      <div class="input-group">
                          Observación&nbsp;
                      </div>
                      <textarea class="form-control" rows="3">
                        
                      </textarea>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group form-inline" style="width: 20%;">
                      <div class="input-group">
                          Costo&nbsp;$&nbsp;
                      </div>
                     <input type="number" step="0.5" min="0" id="" name="" placeholder="" class="form-control" value="0.0" required>
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