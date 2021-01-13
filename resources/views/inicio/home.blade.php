@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h1>{{ __('Mis cursos') }}</h1>
                        </div>
                        <div class="col" style="text-align:right;">
                            <a href="{{ route('cursos.cursos_disponibles') }}" class="btn btn-success">Agregar Curso</a>
                        </div>
                    </div>                                  
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (empty($paginatedCourses))
                        <p>Actualmente no cuenta con cursos inscritos</p>
                    @else
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Progreso</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paginatedCourses as $course)
                                <tr>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->description}}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p style="text-align:center;">50%</p>
                                    </td>
                                    <td>
                                        <a href="{{route('actividades.actividades_curso', $course)}}" class="btn btn-primary">{{ __('Acceder') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    {{ $paginatedCourses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
