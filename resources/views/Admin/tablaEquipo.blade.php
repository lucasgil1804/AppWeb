<div id="loading2" align="center">
              <img src="img/ajax-loader.gif" alt="loading" height="5%" width="5%" />
              <br/>Cargando...
            </div>
            <h4 class="card-title">Equipo</h4>
            @include('Admin.mostrarEquipo')

<div style="display: inline-block; margin-bottom: 15px;">
                <input class="form-control" id="buscarEquipo" type="text" placeholder="Buscar...">
              </div>
              <div style="display: inline-block; float: right; margin-bottom: 15px;">
                  <button type="button" class="btn btn-primary" onclick="NuevoEquipo();">
                    <!-- <a class="linkBlanco" href=""> -->
                    <i class="fa fa-plus"></i>&nbsp; Añadir
                    </button>
              </div>
              <br>

<div class="table-responsive" style="height:150px;">
  <table class="table table-hover bg-white">
    <thead>
      <tr>
        <th>     </th>
        <th>Tipo</th>
        <th>Marca</th>
        <th>Modelo</th>
      </tr>
    </thead>
    <tbody id="myTableEquipo">
      @foreach($listaEquipos as $equipo)
        <tr>
          <td>
          <button  id="" value="{{$equipo->id_equipo}}" onclick="MostrarEquipo(this);">
          <i class="fa fa-plus-circle text-success"></i>
          </button>
          </td>
          <td>{{$equipo->tipoEquipo->descripcion}}</td>
          <td>{{$equipo->marca->descripcion}}</td>
          <td>{{$equipo->modelo}}</td>
        </tr>
      @endforeach
    </tbody>
    </table>
</div>

<script type="text/javascript">
  
  $("#buscarEquipo").on("keyup", function() {
      var value = $(this).val().toLowerCase();
         $("#myTableEquipo tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
  
</script>
