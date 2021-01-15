@extends('layouts.app')

@section('title', 'Actividad individual')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#3490dc;">
                    <div class="row">
                        <div class="col" style="text-align:center;">
                            <h1 style="color:white;">{{ $activity->name }}</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="text-align:center;">
                    @if (session('status_true'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">{{session('status_true')}}</h4>
                        <p>Has realizado correctamente la actividad</p>
                    </div>
                    @endif
                    @if (session('status_false'))
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">{{session('status_false')}}</h4>
                        <p>Vuelve a intentarlo y lee cuidadosamente la descripción</p>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <h4>{{ $activity->question }}</h4>
                        </div>
                    </div>
                    <img src="{{ asset($activity->image->url) }}" width="256" height="256">
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
