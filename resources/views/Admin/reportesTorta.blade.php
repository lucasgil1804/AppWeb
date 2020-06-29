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

<script type="text/javascript">
	$(function () {
	// Build the chart
	$('#tortaReparaciones').highcharts({
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Browser market shares in January, 2018'
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
	        data: [{
	            name: 'Chrome',
	            y: 61.41,
	            sliced: true,
	            selected: true
	        }, {
	            name: 'Internet Explorer',
	            y: 11.84
	        }, {
	            name: 'Firefox',
	            y: 10.85
	        }, {
	            name: 'Edge',
	            y: 4.67
	        }, {
	            name: 'Safari',
	            y: 4.18
	        }, {
	            name: 'Other',
	            y: 7.05
	        }]
	    }]
	});

});

$(function () { 

    $('#tortaReparaciones').highcharts({

        chart: {

            plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'

        },

        title: {

            text: 'Browser market shares in January, 2018'

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
	        data: [{
	            name: 'Chrome',
	            y: 61.41,
	            sliced: true,
	            selected: true
	        }, {
	            name: 'Internet Explorer',
	            y: 11.84
	        }, {
	            name: 'Firefox',
	            y: 10.85
	        }, {
	            name: 'Edge',
	            y: 4.67
	        }, {
	            name: 'Safari',
	            y: 4.18
	        }, {
	            name: 'Other',
	            y: 7.05
	        }]
	    }]

    });

});
</script>

@endsection