@extends('Plantilla.mainlogin')

@section('content')
<article class="sign-up">
    <h1 class="sign-up__title">¡Bienvenido de nuevo!</h1>
    <p class="sign-up__subtitle">Inicia sesión en tu cuenta para continuar</p>
    <form class="sign-up-form form" action="{{ route('login.authenticate') }}" method="POST">
        @csrf
        <label class="form-label-wrapper">
            <p class="form-label">Correo Electrónico</p>
            <input class="form-input" type="email" name="email" placeholder="Ingresa tu correo electrónico" required>
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Contraseña</p>
            <input class="form-input" type="password" name="password" placeholder="Ingresa tu contraseña" required>
        </label>
        @if($errors->has('error'))
        <div class="alert alert-danger text-danger">{{ $errors->first('error') }}</div>
        @endif

        <a class="link-info forget-link" href="##">¿Olvidaste tu contraseña?</a>
        <label class="form-checkbox-wrapper">
            <input class="form-checkbox" type="checkbox" name="remember" required>
            <span class="form-checkbox-label">Recordarme la próxima vez</span>
        </label>
        <button class="form-btn primary-default-btn transparent-btn" type="submit">Iniciar Sesión</button>
    </form>
</article>
@endsection