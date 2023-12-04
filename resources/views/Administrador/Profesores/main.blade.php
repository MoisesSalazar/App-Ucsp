@extends('Plantilla.main')

@section('link')
<a href="{{route('administrador.dashboard')}}" class="logo-wrapper" title="Home">
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
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="main-title">Listado de Profesores</h2>
            <div class="users-table table-wrapper">
                <table style="border-radius: 15px !important;" id="myTable">
                    <thead>
                        <tr class="users-table-info" style="text-align: left;">
                            <th>Código</th>
                            <th>Nombres y Apellidos</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Foto</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profesores as $item)
                        <tr style="text-align: left;">
                            <td>{{$item->codigo}}</td>
                            <td>
                                {{$item->name}} {{$item->lastname}}
                            </td>
                            <td>
                                {{$item->email}}
                            </td>
                            <td>
                                @if($item->estado == 'Activo')
                                <span class="badge-active"> {{$item->estado}}</span>
                                @else
                                <span class="badge-pending"> {{$item->estado}}</span>
                                @endif
                            </td>
                            <td>
                                <div class="pages-table-img">
                                    <picture>
                                        @if (Auth::user()->foto)
                                        <img src="{{ asset(Auth::user()->foto) }}" alt="Foto del usuario">
                                        @else
                                        <img src="{{ asset('vendor/img/avatar/avatar-illustrated-03.webp') }}" alt="User name">
                                        @endif
                                    </picture>
                                </div>
                            </td>
                            <td>
                                <span class="p-relative">
                                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                        <div class="sr-only">More info</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal" aria-hidden="true">
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
@endsection

@section('js')
<script>
    $('#profesores').addClass('active');
</script>
<script>
    $(document).ready(function() {
        let table = $('#myTable').DataTable();
    });
</script>
@endsection