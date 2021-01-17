@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
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
                        <table class="table table-lg">
                            <table class="table align-middle">
                                <caption>Cursos asignados</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>Curso</th>
                                        <th>Descripción</th>
                                        <th>Progreso</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paginatedCourses as $course)
                                    <tr>
                                        <td>{{$course->name}}</td>
                                        <td>{{$course->description}}</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{$course->progress . '%'}};" aria-valuenow="{{$course->progress . '%'}}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p style="text-align:center;">{{$course->progress . '%'}}</p>
                                        </td>
                                        <td>
                                            <a href="{{route('actividades.actividades_curso', $course->slug)}}" class="btn btn-primary">{{ __('Acceder') }}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </table>
                    @endif
                    {{ $paginatedCourses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
