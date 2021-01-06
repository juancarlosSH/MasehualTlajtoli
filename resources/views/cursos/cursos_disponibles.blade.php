@extends('layouts.app')
@section('title', 'Cursos disponibles')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Cursos disponibles') }}</h1>
                </div>
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
                        @if (empty($paginatedAvailableCourses))
                            <p>No tenemos cursos nuevos</p>
                        @else
                            @foreach ($paginatedAvailableCourses as $course)
                            <tr>
                                <td>{{$course->name}}</td>
                                <td>{{$course->description}}</td>
                                <td>
                                    {{-- <a href="{{route('cursos.add', $course)}}" class="btn btn-primary">Agregar</a> --}}
                                    <form action="{{ route('cursos.add', $course) }}" method="POST">
                                        @csrf
                                        <button type="submit">Agregar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                  </tbody>
                </table>
                {{ $paginatedAvailableCourses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
