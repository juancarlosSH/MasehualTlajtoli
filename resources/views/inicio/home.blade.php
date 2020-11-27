@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mis cursos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Curso</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actividades_realizadas as $actividad)
                                @foreach($actividades_generales as $actividad_general)
                                    @foreach($cursos_generales as $curso)
                                        @if($actividad->activity_id === $actividad_general->id && $actividad_general->course_id === $curso->id)
                                            <tr>
                                                <td>{{$curso->name}}</td>
                                                <td>{{$curso->description}}</td>
                                                <td>
                                                    <a href="{{route('actividades.actividades_curso', $curso)}}" class="btn btn-primary">{{ __('Acceder') }}</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
