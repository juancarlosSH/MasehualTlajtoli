@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cursos disponibles') }}</div>
                <div class="card-body">
                <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Opciones</th>
                      </tr>
                  </thead>
                  <tbody>
                        @if (empty($paginateCourses))
                            <p>No tenemos cursos nuevos</p>
                        @else
                            @foreach ($paginateCourses as $course)
                            <tr>
                                <td>{{$course->name}}</td>
                                <td>{{$course->description}}</td>
                                <td>
                                  <a href="{{route('actividades.actividades_curso', $course)}}" class="btn btn-primary">Agregar</a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                  </tbody>
                </table>
                {{ $paginateCourses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
