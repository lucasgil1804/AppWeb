@extends('layouts.estiloAdmin')


@section('contenidoAdmin')

@include('layouts.tableros')

<div class="mx-3 bg-white pt-3">

	<div id="container"></div>

</div>

@endsection

@section('scripts')

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
	var data_ingresosPC = <?php echo $ingresosPC; ?>;
	var data_ingresosNotebook = <?php echo $ingresosNotebook; ?>;
	Highcharts.chart('container', {
    title: {

            text: 'Ingresos Mensuales'

        },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },

    yAxis:{
    	title: {

                text: 'Cantidad en Pesos'

            }
    },

    series: [{
    	name:"PC Escritorio",
        data: data_ingresosPC
    }, {
    	name: "Notebook",
        data: data_ingresosNotebook
    }]
	});

</script>

@endsection