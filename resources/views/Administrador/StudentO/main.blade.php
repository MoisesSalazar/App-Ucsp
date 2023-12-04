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
            <h2 class="main-title">Listado de Student Outcomes</h2>
            <div class="users-table table-wrapper">
                <table style="border-radius: 15px !important;" id="myTable">
                    <thead>
                        <tr class="users-table-info" style="text-align: left;">
                            <th>ID</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studentOutcomes as $item)
                        <tr style="text-align: left;">
                            <td>{{$item->id}}</td>
                            <td>
                                {{$item->outcome_code}}
                            </td>
                            <td>
                                {{$item->description}}
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
    $('#studento').addClass('active');
</script>
<script>
    $(document).ready(function() {
        let table = $('#myTable').DataTable();
    });
</script>
@endsection