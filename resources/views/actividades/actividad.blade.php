@extends('layouts.app')

@section('title', 'Actividad individual')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header" style="background-color:#3490dc;">
                    <div class="row">
                        <div class="col" style="text-align:right;">
                            <h1 style="color:white;">{{ $activity->name }}</h1>
                        </div>
                        <div class="col-5" style="text-align:right;">
                            <a href="{{ route('actividades.actividades_curso', [$course]) }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="text-align:center;">
                    @if (session('status_true'))
                    <div class="alert alert-success" role="alert">
                        <h2 class="alert-heading">{{session('status_true')}}</h2>
                        <p>Haz realizado correctamente la actividad</p>
                    </div>
                    @endif
                    @if (session('status_false'))
                    <div class="alert alert-danger" role="alert">
                        <h2 class="alert-heading">{{session('status_false')}}</h2>
                        <p>Vuelve a intentarlo y lee cuidadosamente la descripción</p>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset($activity->image->url) }}" width="256" height="256">
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="card-body">
                                        <h2 class="card-title"> Descripción</h2>
                                        <p class="card-text">{{$activity->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card-body">
                                        <h2 class="card-title">{{$activity->question}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('actividad.evaluar', [$course, $activity]) }}" method="POST" style="padding:8px;">
                        @csrf
                        <input id="response" type="text" class="form-control @error('response') is-invalid @enderror" name="response" value="{{ old('response') }}" required autocomplete="response" autofocus maxlength="15">
                            @error('response')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="container" style="padding:8px;">
                                <button type="submit" class="btn btn-success btn-lg">{{ __('Revisar') }}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
