@extends('layouts.estiloAdmin')


@section('contenidoAdmin')

<div class="container mx-3 bg-white pt-3">
	<div class="mx-5">
		<select id="anios" name="anioGrafico">
			@foreach ($anios as $anio)
				<option value="{{ $anio }}">{{ $anio }}</option>
			@endforeach
		</select>
	</div>
	<div id="barraMes" class="container"></div>
</div>

<div id="barraAnio" class="container mt-3"></div>

@endsection



@section('scripts')

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
	
	$( "#anios" ).change(function() {
    //validamos las fechass
    var anio = $('#anios').val();
    var ruta = "reparacionesMes/"+anio;
    console.log(ruta);

        $.ajax({
        // url: "reparacionesMes/"+anio.value(),
        url: ruta,
        method: "GET"
      })
    });

</script>

<script type="text/javascript">

    $(function () { 

        var data_listos = <?php echo $listos; ?>;

        var data_pendientes = <?php echo $pendientes; ?>;

        var data_meses = <?php echo $meses; ?>;

       // console.log(Object.values(data_meses));

    $('#barraMes').highcharts({

        chart: {

            type: 'column'

        },

        title: {

            text: 'Estado de las Reparaciones por Mes'

        },

        xAxis: {

            // categories: Object.values(data_meses)
            // categories: [{

            // 	name: 'Meses',

            // 	data: data_meses

            // }]
            categories: data_meses

        },

        yAxis: {

            title: {

                text: 'Número de Reparaciones'

            }

        },

        series: [{

            name: 'Listos',

            data: data_listos

        }, {

            name: 'Pendientes',

            data: data_pendientes

        }]

    });

});

</script>

<script type="text/javascript">

    $(function () { 

        var data_listosPC = <?php echo $listosPC; ?>;

        var data_listosNotebook = <?php echo $listosNotebook; ?>;

       // console.log(Object.values(data_meses));

    $('#barraAnio').highcharts({

        chart: {

            type: 'column'

        },

        title: {

            text: 'Estado de las Reparaciones por Año'

        },

        xAxis: {

            // categories: Object.values(data_meses)
            // categories: [{

            // 	name: 'Meses',

            // 	data: data_meses

            // }]
            categories: ['2020']

        },

        yAxis: {

            title: {

                text: 'Número de Reparaciones'

            }

        },

        series: [{

            name: 'PC Escritorio',

            data: data_listosPC

        }, {

            name: 'Notebook',

            data: data_listosNotebook

        }]

    });

});

</script>

@endsection