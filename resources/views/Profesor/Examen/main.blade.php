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
                <h2 class="main-title">Cursos Asignados</h2>
                <div class="users-table table-wrapper">
                    <table style="border-radius: 15px !important;" id="myTable">
                        <thead>
                            <tr class="users-table-info" style="text-align: left;">
                                <th></th>
                                <th>ID</th>
                                <th>Curso</th>
                                <th>Grupo</th>
                                <th>Semestre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>{{ $curso->id }}</td>
                                    <td>{{ $curso->curso->nombre }}</td>
                                    <td> CCOMP 3-2 </td>
                                    <td> 2023-II </td>
                                    <td>
                                        <a href="{{ route('profesor.examen.editar', $curso->id) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <button type="button" class="btn btn-secondary">
                                            <i class="fas fa-eye"></i> Ver
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('js')
    <script>
        $('#examen').addClass('active');
    </script>
    <script>
        $(document).ready(function() {
            let table = $('#myTable').DataTable();
        });
    </script>
@endsection
