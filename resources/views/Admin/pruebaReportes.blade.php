@extends('layouts.estiloAdmin')


@section('contenidoAdmin')

<div class="container">
	
</div>

@endsection



@section('scripts')

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">

    $(function () { 

        var data_listos = <?php echo $listos; ?>;

        var data_pendientes = <?php echo $pendientes; ?>;

        var data_meses = <?php echo $meses; ?>;

        console.log(Object.values(data_meses));

    $('.container').highcharts({

        chart: {

            type: 'column'

        },

        title: {

            text: 'Yearly Website Ratio'

        },

        xAxis: {

            // categories: Object.values(data_meses)
            // categories: [{

            // 	name: 'Meses',

            // 	data: data_meses

            // }]
            categories: ['Febrero', 'Marzo']

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

@endsection