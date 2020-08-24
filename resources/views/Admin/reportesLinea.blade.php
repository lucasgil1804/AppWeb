@extends('layouts.estiloAdmin')


@section('contenidoAdmin')

@include('layouts.tableros')
<div id="desktop" class="mt-5">
    <div class="mx-3 bg-white pt-3">
        <div class="d-flex justify-content-end mr-2">
            <select id="ingresoAnio" name="ingresoAnio">
                @foreach ($anios as $anio)
                    <option value="{{ $anio }}">{{ $anio }}</option>
                @endforeach
            </select>
        </div>

        <div id="containerLinea" class="pr-3"></div>
    </div>

    <div id="containerLineaAnio" class="mt-3 mx-3"></div>
</div>

<div id="mobile" class="alert alert-info mb-3 mx-3">
    No es posible visualizar la sección <strong>Reportes</strong> desde la vista móvil. Por favor ingrese desde un dispositivo con mayor resolución.
</div>

@endsection

@section('scripts')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!-- <script src="https://code.highcharts.com/modules/series-label.js"></script> -->

<script type="text/javascript">
	var data_ingresosPC = <?php echo $ingresosPC; ?>;
	var data_ingresosNotebook = <?php echo $ingresosNotebook; ?>;
	// Highcharts.chart('containerLinea', {

    $('#containerLinea').highcharts({

    chart: {
        type: 'line'
    },

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

<script type="text/javascript">
    var data_ingresoAnual = <?php echo $IngresoAnual; ?>;
    var data_anios = <?php echo $aniosgrafico; ?>;

    $('#containerLineaAnio').highcharts({

    chart: {
        type: 'line'
    },

    title: {

            text: 'Ingresos Anuales'

        },
    xAxis: {
        categories: data_anios
    },

    yAxis:{
        title: {

                text: 'Cantidad en Pesos'

            }
    },

    series: [{
        name:"Ingresos",
        data: data_ingresoAnual
    }]
    });

</script>

<script type="text/javascript">
    
    $( "#ingresoAnio" ).change(function() {
    //validamos las fechass
    var anio = $('#ingresoAnio').val();
    var ruta = "ingresosMensuales/"+anio;
    console.log(ruta);
      $.ajax({
        // url: "reparacionesMes/"+anio.value(),
        url: ruta,
        method: "GET"
      }).done(function(data) {
          //aqui esta la linea magica
          //chart.series[0].setData();
        console.log(data)
        $('#containerLinea').highcharts().series[0].setData()
        $('#containerLinea').highcharts().series[1].setData()
        // $('#barraMes').highcharts().series[0].setData({})
        // $('#barraMes').highcharts().series[1].setData({})
        $('#containerLinea').highcharts().series[0].setData(data[0],true)
        $('#containerLinea').highcharts().series[1].setData(data[1],true)
        // $('#containerLinea').highcharts().redraw()
         // $('#barraMes').highcharts().xAxis[0].update({categories: ['febrero','marzo']});  
      });
    });

</script>

@endsection