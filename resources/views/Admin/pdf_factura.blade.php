<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>FACTURA</title>
</head>

<style type="text/css">
	.box {
		float: left;
		width: 49.3%;
		border: 2px double #000;
		height: 200px;
		/*margin: 1px 1px;*/
	}

	.clearfix::after {
		content: "";
		clear: both;
		display: table;
	}

	/*ESTILO TABLA*/
	.tabla-factura{
		width:100%;
	}
	td ,th, .tabla-factura{
	 border: 2px double #000;
	 margin: -23px -5px;
	 margin-bottom: 5px;
	 text-align: center;
   	 border-collapse: collapse;
   	 padding: 5px;
	}
	.total{
		/*width: 78%;*/
		/*margin: 0 -1% 0 0.7%;*/
		border: 2px double #000;
		padding: 10px;
	}
	th{
		background-color: #999;
		color: #fff;
	}
	/*ESTILO TABLA*/
</style>

<body>
		<div class="clearfix">
			<div class="box" style="margin-right: 1px; margin-bottom: 1px;">
				<img style="height: 70px; width: 270px; margin-left: 35px; margin-top: 30px;" src="{{asset('img/logo.jpg')}}" alt="QuickFix" /><br>
				<p align="center"><b>San Martin 1524</b></p>
				<p align="center">4-448149</p>
				<p align="center">visitenos en quickfixctes.online</p>
			</div>

			<div class="box" style="margin-left: 1px; margin-bottom: 1px;">
				<h1 style="margin-left: 10px;">FACTURA</h1>
				<p style="margin-left: 10px;">N° 0001-0000{{ $id }}</p>
				<p style="margin-left: 10px;"><b>CUIT:</b> 30-38308485-8</p>
				<p style="margin-left: 10px;">{{ date("d/m/Y",strtotime($fecha_egreso)) }}</p>
			</div>
		</div>

		<div style="border: 2px double #000; clear: both; height: 8%;">
			<div style="display: inline-block; margin-bottom: 5px; margin-left: 10px; margin-top: 7px;">
				<p><b>Cliente:</b> {{$cliente}}</p>
				<p><b>DNI:</b> {{$dni}}</p>
			</div>
			<div style="display: inline-block; float: right; margin-bottom: 5px; margin-right: 10px;">
				<p><b>Fecha Ingreso:</b> {{date("d/m/Y",strtotime($fecha))}}</p>
				<p><b>Equipo:</b> {{$marca}}-{{$modelo}}</p>
			</div>
		</div>

		<br>

		<table class="tabla-factura">
			<tr>
		    	<th>Descripción</th>

		    	<th>Observacion</th>

		    	<th>Costo</th>
			</tr>

			@foreach ($detalles as $detalle)
				<tr>
	    			<td>{{ $detalle->problema->descripcion }}</td>

	    			<td>{{ $detalle->observacion }}</td>

	   				<td>$ {{ $detalle->costo }}</td>
				</tr>
			@endforeach
		</table>

	<div class="total" align="right"><b>Total:</b> $ {{ $total }} </div>
	
</body>

</html>