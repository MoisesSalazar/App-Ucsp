@extends('Plantilla.mainlogin')

@section('content')
<article class="sign-up">
    <h1 class="sign-up__title">Registrarse</h1>
    <form class="sign-up-form form" action="{{ route('register.store') }}" method="POST"> <!-- Agregado action y método POST -->
        @csrf <!-- Agregar el token CSRF para protección contra ataques CSRF -->
        <label class="form-label-wrapper">
            <p class="form-label">Nombre</p>
            <input class="form-input" type="text" name="name" placeholder="Ingresa tu nombre" required>
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Correo Electrónico</p>
            <input class="form-input" type="email" name="email" placeholder="Ingresa tu correo electrónico" required>
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Contraseña</p>
            <input class="form-input" type="password" name="password" placeholder="Ingresa tu contraseña" required>
        </label>
        <button class="form-btn primary-default-btn transparent-btn" type="submit">Registrarse</button> <!-- Cambiado "button" a "submit" y agregado name="submit" -->
    </form>
</article>
@endsection