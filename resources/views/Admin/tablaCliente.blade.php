<div id="loading" align="center">
    <img src="img/ajax-loader.gif" alt="loading" height="5%" width="5%" />
    <br/>Cargando...
</div>
            <h4 class="card-title">Cliente</h4>
            @include('Admin.mostrarCliente')

<div style="display: inline-block; margin-bottom: 15px;">
                <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
              </div>
              <div style="display: inline-block; float: right; margin-bottom: 15px;">
                  <button type="button" class="btn btn-primary" onclick="NuevoCliente();">
                    <!-- <a class="linkBlanco" href=""> -->
                    <i class="fa fa-plus"></i>&nbsp; Añadir
                    </button>
              </div>
              <br>
@if(Session::has('flash_messageExito'))
  <div class="alert alert-success alert-dismissible mt-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      <p>{{Session::get('flash_messageExito')}}</p>
  </div>
 @endif             

<div class="table-responsive" style="height:150px;">
  <table class="table table-hover bg-white">
    <thead>
      <tr>
        <th>     </th>
        <th>Dni</th>
        <th>Apellido</th>
        <th>Nombre</th>
      </tr>
    </thead>
    <tbody id="myTable">
      @foreach($listaClientes as $client)
        <tr>
          <td>
          <button  id="agregarcliente" value="{{$client->id_usuario}}" onclick="Mostrar(this);">
          <i class="fa fa-plus-circle text-success"></i>
          </button>
          </td>
          <td>{{$client->dni}}</td>
          <td>{{$client->apellido}}</td>
          <td>{{$client->nombre}}</td>
        </tr>
      @endforeach
    </tbody>
    </table>
</div>

<script type="text/javascript">
  
  $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
         $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
  
</script>
