@extends('layouts.app')
@section('title', 'Cursos disponibles')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h1>{{ __('Cursos disponibles') }}</h1>
                        </div>
                        <div class="col" style="text-align:right;">
                            <a href="{{ route('inicio.home') }}" class="btn btn-success">Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <table class="table">
                  <thead class="thead-light">
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
                                        <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">
                                            {{ __('Agregar') }}
                                        </button>
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
