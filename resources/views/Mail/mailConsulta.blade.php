<!DOCTYPE html>
<html lang="es">
    <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
<body>
    <div class="jumbotron col-md-8 my-1 mx-auto py-2">
        <h3>Consulta del Usuario:</h3>
        <div class="mx-2">
          <p><strong>Nombre: </strong>{{$consulta['name']}}</p>
          <p><strong>Email: </strong>{{$consulta['email']}}</p>
          <p><strong>Asunto: </strong>{{$consulta['subject']}}</p>
          <p class="my-0"><strong>Mensaje:</strong></p>
          <p>{{$consulta['message']}}</p>
        </div>
    </div>
    <div class="container col-md-8 mx-auto">
        <p>Esta consulta fue realizada a través de la pagina web QuickFix.</p>  
    </div>
    </body>
</html>
