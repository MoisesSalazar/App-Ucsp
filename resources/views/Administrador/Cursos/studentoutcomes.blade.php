@extends('Plantilla.main')

@section('link')
    <a href="{{ route('administrador.dashboard') }}" class="logo-wrapper" title="Home">
        <span class="sr-only">Home</span>
        <span class="icon logo" aria-hidden="true" style="background-size: cover; border-radius:15px;"></span>
        <div class="logo-text">
            <span class="logo-title">UCSP</span>
            <span class="logo-subtitle">Dashboard</span>
        </div>
    </a>
@endsection
@section('sidebar')
    @include('Administrador.sidebar')
@endsection

@section('content')
    <style>
        /* Estilos personalizados para el modal */
        .modal-custom {
            /* Personaliza el fondo, el borde y otros estilos del modal */
            background-color: #ffffff;
            border: 1px solid #000;
            /* Agrega tus estilos personalizados aquí */
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="main-title">Listado de Cursos</h2>
                <button class="modal-btn button mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span>Crear</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #ffffff
                            }
                        </style>
                        <path
                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                    </svg>
                </button>

                <div class="users-table table-wrapper">
                    <table style="border-radius: 15px !important;" id="myTable">
                        <thead>
                            <tr class="users-table-info" style="text-align: left;">
                                <th>ID</th>
                                <th>Curso</th>
                                <th>SO1</th>
                                <th>SO2</th>
                                <th>SO3</th>
                                <th>SO4</th>
                                <th>SO5</th>
                                <th>SO6</th>
                                <th>SO7</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $item)
                                <tr style="text-align: left;">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    @for ($i = 1; $i <= 7; $i++)
                                        <td>
                                            @foreach($item->cursoStudentOutcomes as $outcome)
                                                @if($outcome->student_outcome_id == $i)
                                                    <i class="fa fa-check"></i>
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                    
                                    <td>
                                        <span class="p-relative">
                                            <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                                <div class="sr-only">More info</div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-horizontal" aria-hidden="true">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </button>
                                            <ul class="users-item-dropdown dropdown">
                                                <li><a href="##">Edit</a></li>
                                                <li><a href="##">Quick edit</a></li>
                                                <li><a href="##">Trash</a></li>
                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('administrador.asignarstudentout.crear') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="courseSelect">Seleccionar Curso:</label>
                            <select class="form-control" id="courseSelect" name="id_curso">
                                <option>Seleccionar Curso</option>
                                @foreach ($cursos as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="studentOutcomeSelect">Selecciona Student Outcomes:</label>
                            <select class="form-control" id="studentOutcomeSelect" name="id_student_outcome">
                                <option> Seleccionar StudentOutcome </option>
                                @foreach ($studentOutcomes as $item)
                                    <option value="{{ $item->id }}">{{ $item->description }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $('#cursos').addClass('active');
        $('#cursosa').addClass('active');
    </script>
    <script>
        $(document).ready(function() {
            let table = $('#myTable').DataTable();
        });
    </script>
@endsection
