<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCSP - Ciencia de la Computación</title> <!-- Cambia el título aquí -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('vendor/img/svg/logo.svg')}}" type="image/x-icon">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{asset('vendor/css/style.min.css')}}">
</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        @yield('content')
    </main>
    <!-- Biblioteca de gráficos -->
    <script src="{{asset('vendor/plugins/chart.min.js')}}"></script>
    <!-- Biblioteca de iconos -->
    <script src="{{asset('vendor/plugins/feather.min.js')}}"></script>
    <!-- Scripts personalizados -->
    <script src="{{asset('vendor/js/script.js')}}"></script>
</body>

</html>