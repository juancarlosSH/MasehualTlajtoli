@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        BIENVENIDO {{auth()->user()->name}} {{auth()->user()->last_name}}
                    @endauth
                </div>

                <div class="container">
                    <a href="{{route('cursos.cursos_disponibles')}}" class="btn btn-primary">Cursos disponibles</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
