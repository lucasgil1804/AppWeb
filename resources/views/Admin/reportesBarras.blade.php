@extends('layouts.estiloAdmin')


@section('contenidoAdmin')

<div class="mx-3 bg-white pt-3">
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
      }).done(function(data) {
          //aqui esta la linea magica
          //chart.series[0].setData();
          $('#barraMes').highcharts().series[0].setData()
          $('#barraMes').highcharts().series[1].setData()
        // $('#barraMes').highcharts().series[0].setData({})
        // $('#barraMes').highcharts().series[1].setData({})
        $('#barraMes').highcharts().series[0].setData(data[0],true)
        $('#barraMes').highcharts().series[1].setData(data[1],true)
         // $('#barraMes').highcharts().xAxis[0].update({categories: ['febrero','marzo']});  
      });
    });

</script>

<script type="text/javascript">

    $(function () { 

        var data_PC = <?php echo $PC; ?>;

        var data_Notebook = <?php echo $Notebook; ?>;

       // console.log(Object.values(data_meses));

    $('#barraMes').highcharts({

        chart: {

            type: 'column'

        },

        title: {

            text: 'Cantidad de Reparaciones por Mes'

        },

        xAxis: {

            // categories: Object.values(data_meses)
            // categories: [{

            // 	name: 'Meses',

            // 	data: data_meses

            // }]
            // categories: data_meses
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']

        },

        yAxis: {

            title: {

                text: 'Número de Reparaciones'

            }

        },

        series: [{

            name: 'PC Escritorio',

            data: data_PC

        }, {

            name: 'Notebook',

            data: data_Notebook

        }]

    });

});

</script>

<script type="text/javascript">

    $(function () { 

        var data_listosPC = <?php echo $listosPC; ?>;

        var data_listosNotebook = <?php echo $listosNotebook; ?>;

        var data_anios = <?php echo $aniosgrafico; ?>;

       // console.log(Object.values(data_meses));

    $('#barraAnio').highcharts({

        chart: {

            type: 'column'

        },

        title: {

            text: 'Cantidad de Reparaciones por Año'

        },

        xAxis: {

            // categories: Object.values(data_meses)
            // categories: [{

            // 	name: 'Meses',

            // 	data: data_meses

            // }]
            categories: data_anios

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