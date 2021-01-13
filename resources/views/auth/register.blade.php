@extends('layouts.app')

@section('title', 'Registro de cuenta')
@section('content')
<div class="container">
    <div class="row justify-content-center">
                    <form method="POST" action="{{ route('register') }}">
                        <h1 class="h1 mb-3 font-weight-normal">Registro de cuenta</h1>
                        @csrf
                            <label for="name">{{ __('Nombre(s)') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  minlength="3" maxlength="30">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="last_name">{{ __('Apellidos') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="on" autofocus  minlength="4" maxlength="40">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="email">{{ __('Correo electrónico') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="100">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="password">{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  minlength="8" maxlength="32">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="password-confirm">{{ __('Confirmar contraseña') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  minlength="8" maxlength="32">

                            <div class="container" style="padding:15px;">
                                <div class="row">
                                    <div class="col" style="text-align:left;">
                                        <a href="{{ route('inicio.welcome') }}">
                                            <button type="button" class="btn btn-secondary" name="cancelarButton">
                                                {{ __('Cancelar') }}
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col" style="text-align:right;">
                                        <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true; cancelarButton.disabled = true;">
                                            {{ __('Registrar') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                    </form>
    </div>
</div>
@endsection
