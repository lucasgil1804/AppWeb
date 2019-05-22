@extends('layouts.estiloAdmin')


@section('contenidoAdmin')


<div class="card" style="margin-right: 20px; margin-left: 20px;" >
	<div class="card-header"><h3>Detalle de Usuario</h3></div>
		<div class="card-body card-block">

			<p class="mb-3"><b>DNI:</b> {{ $user->dni }}</p>
			<p class="mb-3"><b>Nombre y Apellido:</b> {{ $user->nombre. " " .$user->apellido }}</p>
			<p class="mb-3"><b>Email:</b> {{ $user->email }}</p>
			@if ( $user->estado == 1)
				<p class="mb-3"><b>Estado:</b> Activo</p>
			@else
				<p class="mb-3"><b>Estado:</b> Inactivo</p>
			@endif
			<button class="btn btn-primary" type="button" title="Regresar">
				<a style="color: white;" href="{{ route('adminListaUsuario') }}">
				<i class="fa fa-arrow-circle-left"></i>
				Regresar</a>
			</button>
			
		</div>
</div>


@endsection