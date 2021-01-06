@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Mis cursos') }}</h1>
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
                            <thead>
                                <tr>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paginatedCourses as $course)
                                <tr>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->description}}</td>
                                    <td>
                                        <a href="{{route('actividades.actividades_curso', $course)}}" class="btn btn-primary">{{ __('Acceder') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    {{ $paginatedCourses->links() }}
                    <a href="{{ route('cursos.cursos_disponibles') }}" class="btn btn-primary">Agregar Curso</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
