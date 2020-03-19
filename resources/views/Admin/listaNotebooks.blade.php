@extends('layouts.estiloAdmin')

<!-- Estilo Datatable -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<!-- Estilo Datatable -->

@section('contenidoAdmin')

<div style="margin-left: 20px; margin-right: 20px;">
    <h3 style="margin-bottom: 30px;">Lista de Notebooks</h3>
    @if(Session::has('flash_messageExito'))
        <div class="alert alert-success mt-3">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><i class="fa fa-check"></i></strong> {{Session::get('flash_messageExito')}}
        </div>
    @endif   
    
        <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%; text-align: center;">
        <thead>
            <tr>
                <th>Ingreso</th>
                <th>Cliente</th>
                <th>Equipo</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reparaciones as $reparacion)
            <tr>
                <td>{{date("d/m/Y", strtotime($reparacion->fecha_ingreso))}}</td>
                <td>{{$reparacion->usuario->apeYNom()}}</td>
                <td>{{$reparacion->equipo->marca->descripcion. "-" .$reparacion->equipo->modelo}}</td>
                @if ( $reparacion->deleted_at == null)
                    <td><!-- <i style="color: green;" class="fa fa-arrow-circle-up" data-toggle="tooltip" data-placement="top" title="Activo"></i> -->
                         @if( $reparacion->id_estado == 1 )
                                    <span class="role client">
                                        En Diagnóstico&nbsp; 
                                        <i class="fa fa-stethoscope"></i>
                                    </span>
                                @elseif ( $reparacion->id_estado == 2 )
                                    <span class="role employ">
                                       En Reparación&nbsp; 
                                       <i class="fa fa-cogs"></i>
                                    </span>
                                @else
                                    <span class="role tech">
                                        Listo&nbsp;
                                        <i class="fa fa-check"></i>
                                    </span>
                                @endif
                    </td>
                @else
                    <td>
                        <span class="role admin">
                         Anulado&nbsp;
                         <i class="fa fa-times"></i>
                        </span>
                    </td>
                @endif
               <!--  Campo Accion -->
                <td>
                    <!-- <div class="table-data-feature" style="position: relative;"> -->
                    <div class="botones-accion" style="">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Ver detalle">
                            <a href="{{ route('adminDetallesReparacion', ['id' => $reparacion->id_reparacion]) }}">
                            <i class="zmdi zmdi-eye" style="color: grey;"></i></a>
                        </button>

                        @if($reparacion->deleted_at == null)
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                <a href="{{ route('adminEditarReparacion', ['id' => $reparacion->id_reparacion]) }}">
                                <i class="zmdi zmdi-edit" style="color: grey;"></i></a>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Dar de Baja">
                                <a href="#" data-href="{{route('adminBajaReparacion',['id' => $reparacion->id_reparacion])}} " data-toggle="modal" data-target="#deleteModal">
                                <i class="zmdi zmdi-delete" style="color: grey;"></i></a>
                            </button>
                        @else
                            <button class="item" data-toggle="tooltip" data-placement="top" title="No se permite editar">
                                <i class="zmdi zmdi-edit" style="color: grey;"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Dar de Alta">
                                <a href="#" data-href="{{route('adminAltaReparacion',['id' => $reparacion->id_reparacion])}}" data-toggle="modal" data-target="#upModal">
                                <i class="zmdi zmdi-plus" style="color: grey;"></i></a>
                            </button>
                        @endif

                        @if ($reparacion->deleted_at == null && $reparacion->id_estado == 3)
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Ver Factura">
                                <a href="{{ route('adminFacturaPDF', ['id' => $reparacion->id_reparacion]) }}" target="_blank">
                                <i class="zmdi zmdi-file-text" style="color: grey;"></i></a>
                            </button>
                        @endif

                    </div>
                </td>
                <!-- Fin Campo Accion -->
            </tr>


            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Ingreso</th>
                <th>Cliente</th>
                <th>Equipo</th>
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
            <p>¿Está seguro que desea dar de baja ésta reparación?</p>
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
            <p>¿Está seguro que desea dar de alta ésta reparación?</p>
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