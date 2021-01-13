@extends('layouts.app')

@section('title', 'Inicio de sesión')
@section('content')
<div class="container">
    <div class="row justify-content-center">
            <form method="POST" action="{{ route('login') }}">
                        <img class="rounded mx-auto d-block" src="{{asset('/images/masehual_logo.png')}}" alt="" width="160" height="160">
                        <h1 class="h1 mb-3 font-weight-normal">Inicio de sesión</h1>
                        @csrf
                            <label for="email">{{ __('Correo electrónico') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus maxlength="100">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="password">{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" minlength="8" maxlength="32">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="row justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Recuérdame') }}
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">
                                    {{ __('Ingresar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" name="contrasenaOlvidadaAncla">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                    </form>
    </div>
</div>
@endsection
