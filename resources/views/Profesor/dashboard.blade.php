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
@include('Profesor.sidebar')
@endsection

@section('js')
<script>
    $('#dashboard').addClass('active');
</script>
@endsection