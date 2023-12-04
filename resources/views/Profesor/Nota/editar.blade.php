@extends('Plantilla.main')

@section('link')
    <a href="{{ route('profesor.dashboard') }}" class="logo-wrapper" title="Home">
        <span class="sr-only">Home</span>
        <span class="icon logo" aria-hidden="true" style="background-size: cover; border-radius:15px;"></span>
        <div class="logo-text">
            <span class="logo-title">UCSP</span>
            <span class="logo-subtitle">Dashboard</span>
        </div>
    </a>
@endsection
@section('sidebar')
    @include('Profesor.sidebar')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="main-title">Codigo : {{ $curso->id }}</h2>
                <h2 class="main-title">Curso: {{ $curso->curso->nombre }}</h2>
                <button id="addRecord" class="btn btn-primary">Añadir registro</button>
                <button id="saveChanges" class="btn btn-success">Guardar</button>
            </div>
            <div class="col-12">
                <table id="registros" class="table table-striped mt-3 p-3">
                    <thead>
                        <tr>
                            <th>Orden</th>
                            <th>Nombre del Alumno</th>
                            <th>Codigo del Alumno</th>
                            @foreach ($preguntas as $index => $pregunta)
                                <th title="{{$pregunta['question']}}">Pregunta {{ $index + 1 }}</th>
                            @endforeach
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Los registros se agregarán aquí -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#profesor').addClass('active');
    </script>
    <script>
        $(document).ready(function() {
            let table = $('#registros').DataTable();
            let preguntas = @json($preguntas);
            console.log(preguntas);
            $('#addRecord').click(function() {
                // Agrega un nuevo registro a la tabla
                let orden = table.rows().count() + 1;
                let row = [
                    orden,
                    '<input type="text" name="nombreAlumno">',
                    '<input style="width:200px;" type="text" name="codigoAlumno">'
                ];
                for (let i = 0; i < preguntas.length; i++) {
                    row.push('<input style="width:100px;" type="text" name="' + preguntas[i]['question'] + '">');
                }
                row.push('<button class="btn btn-danger">Eliminar</button>');
                table.row.add(row).draw(false);
            });

            $('#registros').on('click', '.btn-danger', function() {
                table.row($(this).parents('tr')).remove().draw();
            });

            $('#saveChanges').click(function() {
                // Guarda los cambios
                // Aquí puedes agregar el código para guardar los cambios
            });
        });
    </script>
@endsection
