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
                      @foreach($cursos_disponibles as $curso)
                      <tr>
                          <td>{{$curso->name}}</td>
                          <td>{{$curso->description}}</td>
                          <td>
                            <a href="{{route('cursos.detalle', $curso)}}" class="btn btn-primary">{{ __('Acceder') }}</a>
                          </td>
                      </tr>
                      @endforeach   
                  </tbody>
              </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection