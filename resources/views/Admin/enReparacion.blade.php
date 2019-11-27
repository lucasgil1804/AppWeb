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
  
    <form action="" method="post" class="was-validated"> 
    
              {{csrf_field()}}
              <div class="form-group">
                  <div class="input-group form-inline">
                      <label style="width: 15%;">
                          <b>Descripción</b>&nbsp;
                      </label>
                      <input type="text" id="" name="" placeholder="" class="form-control" value="" required>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group form-inline">
                      <label style="width: 15%;">
                          <b>Observación</b>&nbsp;
                      </label>
                      <textarea class="form-control" rows="3" required></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group form-inline">
                      <label style="width: 15%;">
                          <b>Costo&nbsp;$</b>&nbsp;
                      </label>
                      <div style="width: 10%;">
                        <input type="number" step="0.5" min="0" id="" name="" placeholder="" class="form-control" value="0.0" required>
                     </div>
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
  </div>