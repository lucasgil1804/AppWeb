<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>COMPROBANTE</title>
</head>
<style type="text/css">
	.tabla-factura{
		width:100%;
	}
	td ,th, .tabla-factura{
	 border: 1px solid #999;
	 margin: 10px auto;
	 text-align: center;
   	 border-collapse: collapse;
   	 padding: 5px;	
	}
	.total{
		/*width: 78%;*/
		margin: 0 -1% 0 0.7%;
		border: 1px solid #999;
		padding: 10px;
	}
	th{
		background-color: #999;
		color: #fff;
	}



</style>
<body>
	<div style="margin: 10px 80px; border: 2px double #000; padding: 15px;">
		<div style="margin: 10px 0px;">
			<img src="img/logo.png" alt="QuickFix" />
		</div>
		<div style="display: inline-block; margin-bottom: 15px;">
			<p><b>Cliente:</b> {{$cliente}}</p>
			<p><b>DNI:</b> {{$dni}}</p>
		</div>
		<div style="display: inline-block; float: right; margin-bottom: 15px;">
			<p><b>Fecha Ingreso:</b> {{date("d/m/Y",strtotime($fecha))}}</p>
			<p><b>Equipo:</b> {{$marca}}-{{$modelo}}</p>
		</div>
		<br>
		<div align="center" style="border: 1px solid #000;">
			<p><b>Código de Seguimiento:</b> {{$dni}}/{{$id}}</p>
		</div>
		<p align="center" style="font-size: 10px;margin-top:0px; ">(*) Con este código podrá consultar el estado de su equipo en nuestro sitio web.</p>
	</div>

	<table class="tabla-factura">
		<tr>
	    	<th>Descripción</th>

	    	<th>Observacion</th>

	    	<th>Costo</th>
		</tr>
		<tr>
	    	<td>Se cuelga</td>

	    	<td>-</td>

	   		<td>$ 500</td>
		</tr>
		<tr>
	    	<td>Limpieza de virus</td>

	    	<td>-</td>

	   		<td>$ 300</td>
		</tr>
		<tr>
	    	<td>Instalacion Office</td>

	    	<td>-</td>

	   		<td>$ 250</td>
		</tr>
		
	</table>

	<div class="total" align="right">Total: $ 2000 </div>
</body>

</html>