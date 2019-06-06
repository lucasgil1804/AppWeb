@extends('layouts.estiloAdmin')

<!-- Estilo Datatable -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->
<!-- Estilo Datatable -->

@section('contenidoAdmin')

<!-- USER DATA-->
<div class="user-data m-b-30 m-r-30 m-l-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>Datos de Usuarios</h3>
            <div class="table table-data">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>DNI</td>
                            <td>Rol</td>
                            <td>Estado</td>
                        </tr>
                    </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                                                    
                            <td>
                                <div class="table-data__info">
                                    <h6>{{ $user->nombre. " " .$user->apellido }}</h6>
                                        <span>
                                            {{ $user->email }}
                                        </span>
                                </div>
                            </td>
                            <td>{{ $user->dni }}</td>
                            <td>
                                @if( $user->id_tipoUsuario == 1 )
                                    <span class="role admin">{{ $user->tipoUsuario->descripcion }}</span>
                                @elseif ( $user->id_tipoUsuario == 2 )
                                    <span class="role employ">{{ $user->tipoUsuario->descripcion }}</span>
                                @elseif ( $user->id_tipoUsuario == 3 )
                                    <span class="role tech">{{ $user->tipoUsuario->descripcion }}</span>
                                @else
                                    <span class="role client">{{ $user->tipoUsuario->descripcion }}</span>
                                @endif
                            </td>
                            @if ( $user->deleted_at == null)
                                <td><i style="color: green;" class="fa fa-arrow-circle-up" data-toggle="tooltip" data-placement="top" title="Activo"></i></td>
                            @else
                                <td><i style="color: red;" class="fa fa-arrow-circle-down" data-toggle="tooltip" data-placement="top" title="Inactivo"></i></td>
                            @endif
                                                    
                        </tr>
                    @endforeach
                                                
                </tbody>
                </table>
            </div>
                                    
</div>
<!-- END USER DATA-->

@endsection

@section('scripts')

@endsection