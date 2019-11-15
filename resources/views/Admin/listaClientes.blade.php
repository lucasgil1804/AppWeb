@extends('layouts.estiloAdmin')

<!-- Estilo Datatable -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<!-- Estilo Datatable -->

@section('contenidoAdmin')
@if(Session::has('flash_message'))
    <!-- The Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Registro Exitoso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>{{Session::get('flash_message')}}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #ff4000; border-color: white;">Aceptar</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
        </div>
    </div>
    </div>

     
@endif


<div style="margin-left: 20px; margin-right: 20px;">
    <h3>Lista de Clientes</h3>
    @if(Session::has('flash_messageExito'))
        <div class="alert alert-success mt-3">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><i class="fa fa-check"></i></strong> {{Session::get('flash_messageExito')}}
        </div>
    @endif    
    <div  style="margin-bottom: 15px;" align="right">
        <button type="button" class="btn btn-primary">
            <a class="linkBlanco" href="{{route('adminNuevoUsuario',['tipoUser' => 4])}}">
            <i class="fa fa-plus"></i>&nbsp; Añadir</a>
        </button>
    </div>
    <!-- <table id="myTable" class="table table-hover table-striped table-bordered" style="width:100%;text-align: center;"> -->
        <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%; text-align: center;">
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
            @foreach ($listaClientes as $user)
            <tr>
                <td>{{ $user->dni }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->apellido }}</td>
                <td>{{ $user->email }}</td>
                @if ( $user->deleted_at == null)
                    <td><i style="color: green;" class="fa fa-arrow-circle-up" data-toggle="tooltip" data-placement="top" title="Activo"></i></td>
                @else
                    <td><i style="color: red;" class="fa fa-arrow-circle-down" data-toggle="tooltip" data-placement="top" title="Inactivo"></i></td>
                @endif
                
                <td>
                    <!-- <div class="table-data-feature" style="position: relative;"> -->
                    <div class="botones-accion" style="">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Ver detalle">
                            <a href="{{route('adminVerDetalle',['id' => $user->id_usuario])}}">
                            <i class="zmdi zmdi-eye" style="color: grey;"></i></a>
                        </button>

                        @if($user->deleted_at == null)
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                <a href="{{route('adminEditarUsuario',['id' => $user->id_usuario])}}">
                                <i class="zmdi zmdi-edit" style="color: grey;"></i></a>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Dar de Baja">
                                <a href="#" data-href="{{route('adminBajaUsuario',['id' => $user->id_usuario])}}" data-toggle="modal" data-target="#deleteModal">
                                <i class="zmdi zmdi-delete" style="color: grey;"></i></a>
                            </button>
                        @else
                            <button class="item" data-toggle="tooltip" data-placement="top" title="No se permite editar">
                                <i class="zmdi zmdi-edit" style="color: grey;"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Dar de Alta">
                                <a href="#" data-href="{{route('adminAltaUsuario',['id' => $user->id_usuario])}}" data-toggle="modal" data-target="#upModal">
                                <i class="zmdi zmdi-account-add" style="color: grey;"></i></a>
                            </button>
                        @endif

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

    <!-- The Modal Delete -->
    <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Dar de baja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>¿Está seguro que desea dar de baja éste usuario?</p>
        </div>
        <div class="modal-footer">
            <a class="btn btn-danger btn-ok" >Aceptar</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
    </div>


        <!-- The Modal Up -->
    <div class="modal" tabindex="-1" role="dialog" id="upModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Dar de alta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>¿Está seguro que desea dar de alta éste usuario?</p>
        </div>
        <div class="modal-footer">
            <a class="btn btn-danger btn-ok" >Aceptar</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
    </div>

@endsection

@section('scripts')
<!-- <script>
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script> -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

<script>

    // Funcionalidad del modal DELETE
    $('#deleteModal').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', 
    $(e.relatedTarget).data('href'));

    $('.debug-url').html('URL: <strong>' + 
    $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    // Funcionalidad del modal DELETE


    // Funcionalidad del modal UP
    $('#upModal').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', 
    $(e.relatedTarget).data('href'));

    $('.debug-url').html('URL: <strong>' + 
    $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    // Funcionalidad del modal UP
   

    $("#myModal").modal('show');
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