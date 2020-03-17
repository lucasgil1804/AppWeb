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
</style>

<body>
		<div class="clearfix">
			<div class="box" style="margin-right: 1px; margin-bottom: 1px;">
				<img style="height: 70px; width: 270px; margin-left: 35px; margin-top: 30px;" src="img/logo.png" alt="QuickFix" /><br>
				<p align="center"><b>San Martin 1524</b></p>
				<p align="center">4-448149</p>
			</div>

			<div class="box" style="margin-left: 1px; margin-bottom: 1px;">
				<h1 style="margin-left: 10px;">FACTURA</h1>
				<p style="margin-left: 10px;">N° 0001-00000597</p>
				<p style="margin-left: 10px;"><b>CUIT:</b> 30-38308485-8</p>
				<p style="margin-left: 10px;">25/05/2100</p>
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
		<div align="center" style="clear: both; border: 1px solid #000;">
			<p><b>Código de Seguimiento:</b> {{$dni}}/{{$id}}</p>
		</div>
		<p align="center" style="font-size: 10px;margin-top:0px; ">(*) Con este código podrá consultar el estado de su equipo en nuestro sitio web.</p>
	
</body>

</html>