@extends('layouts.estiloAdmin')


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
        </div>
        </div>
    </div>
    </div>
@endif

<div class="card" style="margin-right: 20px; margin-left: 20px;" >
	<div class="card-header"><h3>Detalle del {{ $user->tipoUsuario->descripcion }}</h3></div>
		<div class="card-body card-block">

			<p class="mb-3"><b>DNI:</b> {{ $user->dni }}</p>
			<p class="mb-3"><b>Nombre y Apellido:</b> {{ $user->nombre. " " .$user->apellido }}</p>
			<p class="mb-3"><b>Email:</b> {{ $user->email }}</p>

			@if ( $user->deleted_at == null)
				<p class="mb-3"><b>Estado:</b> Activo</p>
                <p class="mb-3"><b>Fecha de alta:</b> {{ date("d/m/Y", strtotime($user->created_at)) }}</p>
			@else
				<p class="mb-3"><b>Estado:</b> Inactivo</p>
				<p class="mb-3"><b>Fecha de baja:</b> {{ date("d/m/Y", strtotime($user->deleted_at)) }}</p>
			@endif

            @if ($user->id_tipoUsuario == 1)
            <button class="btn btn-primary" type="button" title="Regresar">
                <a style="color: white;" href="{{ route('adminIndex') }}">
                <i class="fa fa-arrow-circle-left"></i>
                Regresar</a>
            </button>

            @elseif ($user->id_tipoUsuario == 2)
			<button class="btn btn-primary" type="button" title="Regresar">
				<a style="color: white;" href="{{ route('adminListaEmpleados') }}">
				<i class="fa fa-arrow-circle-left"></i>
				Regresar</a>
			</button>

            @elseif ($user->id_tipoUsuario == 3)
            <button class="btn btn-primary" type="button" title="Regresar">
                <a style="color: white;" href="{{ route('adminListaTecnicos') }}">
                <i class="fa fa-arrow-circle-left"></i>
                Regresar</a>
            </button>

            @else
              <button class="btn btn-primary" type="button" title="Regresar">
                <a style="color: white;" href="{{ route('adminListaClientes') }}">
                <i class="fa fa-arrow-circle-left"></i>
                Regresar</a>
            </button>

            @endif
			
		</div>
</div>

@endsection

@section('scripts')

<script>
	$("#myModal").modal('show');
</script>

@endsection