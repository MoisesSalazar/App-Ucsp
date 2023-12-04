<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">¡Ha ocurrido un error!</h1>
            <p class="lead">Error: {{ $exception->getMessage() }}</p>
            <hr class="my-4">
            <p>Si el problema persiste, por favor, contacta con el soporte técnico.</p>
            <a class="btn btn-primary btn-lg" href="{{ url('/') }}" role="button">Volver al inicio</a>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>