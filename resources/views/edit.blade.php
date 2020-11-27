@extends('layouts.app')

@section('title', 'Editar usuario')

@section('style')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('update')}}" method="POST">
            <h1 class="h1 mb-3 font-weight-normal">Actualización de información</h1>
            @csrf
            <label>
                Nombre(s):
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  minlength="3" maxlength="30">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <br>
            <label>
                Apellidos:
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="on" autofocus  minlength="4" maxlength="40">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <br>
            <label>
                Correo electrónico:
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="100">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
            <br>
            <div class="container" style="padding:15px;">
                <div class="row">
                    <div class="col" style="text-align:left;">
                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                    </div>
                    <div class="col" style="text-align:right;">
                        <a href="{{ route('inicio.welcome') }}">
                            <button type="button" class="btn btn-secondary">
                                Cancelar
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
