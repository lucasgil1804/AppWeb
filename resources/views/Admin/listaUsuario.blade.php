@extends('layouts.estiloAdmin')

<!-- Estilo Datatable -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<!-- Estilo Datatable -->

@section('contenidoAdmin')
@if(Session::has('flash_message'))
  <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
@endif 

<div style="margin-left: 20px; margin-right: 20px;">
    <h3>Lista de Empleados</h3>
    <div  style="margin-bottom: 15px;" align="right">
        <button type="button" class="btn btn-primary" onclick="location='{{ route('adminNuevoUsuario') }}'">
            <i class="fa fa-plus"></i>&nbsp; Añadir</button>
    </div>
    <table id="myTable" class="table table-hover table-striped table-bordered" style="width:100%;text-align: center;">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->dni }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->apellido }}</td>
                <td>{{ $user->email }}</td>
                @if ( $user->estado == 1)
                    <td><i style="color: green;" class="fa fa-arrow-circle-up" data-toggle="tooltip" data-placement="top" title="Activo"></i></td>
                @else
                    <td><i style="color: red;" class="fa fa-arrow-circle-down" data-toggle="tooltip" data-placement="top" title="Inactivo"></i></td>
                @endif
                <!-- <td>{{ $user->estado }}</td> -->
                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Ver detalle">
                            <i class="zmdi zmdi-eye"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Borrar">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>  -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable(
        {
            "language": {
                "decimal":        "",
                "emptyTable":     "No hay datos disponibles para esta tabla.",
                "info":           "Mostrando _START_ de _END_ sobre _TOTAL_ registros",
                "infoEmpty":      "Mostrando 0 de 0 sobre 0 registros",
                "infoFiltered":   "(filtrado de _MAX_ registros)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search":         "Buscar:",
                "zeroRecords":    "No se encontró ningún registro",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                }
            }
        });
    });
</script>

@endsection