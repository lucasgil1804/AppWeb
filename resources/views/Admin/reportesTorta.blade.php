@extends('layouts.estiloAdmin')

@section('contenidoAdmin')

<div class="mx-3 bg-white pt-3">
	<div class="mx-5">
	</div>
	<div id="tortaReparaciones" class="container"></div>
</div>

<!-- <div id="barraAnio" class="container mt-3"></div> -->

@endsection

@section('scripts')

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
	$(function () {
	var datos = <?php echo $consultaProblemas ?>;
	var datosEstaticos = [{name:'Chrome', y:60.20, sliced:true}, {name:'Mozilla', y:49.80}];
	console.log(datos);
	$('#tortaReparaciones').highcharts({
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Historial de problemas'
	    },
	    tooltip: {
	        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	    },
	    accessibility: {
	        point: {
	            valueSuffix: '%'
	        }
	    },
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: false
	            },
	            showInLegend: true
	        }
	    },
	    series: [{
	        name: 'Brands',
	        colorByPoint: true,
	        // data: [{
	        //     name: 'Chrome',
	        //     y: 61.41,
	        //     sliced: true,
	        //     selected: true
	        // }, {
	        //     name: 'Internet Explorer',
	        //     y: 11.84
	        // }, {
	        //     name: 'Firefox',
	        //     y: 10.85
	        // }, {
	        //     name: 'Edge',
	        //     y: 4.67
	        // }, {
	        //     name: 'Safari',
	        //     y: 4.18
	        // }, {
	        //     name: 'Other',
	        //     y: 7.05
	        // }]

	        data: datos
	        
	    }]
	});

});

</script>

@endsection