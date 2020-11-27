@extends('layouts.app')

@section('title', 'Actividades del curso')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actividades disponibles') }}</div>

                <div class="card-body">
                <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Estado</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($actividades_realizadas as $actividad)
                        @foreach($actividades_generales as $actividad_general)
                            @if($actividad->activity_id === $actividad_general->id)
                                <tr>
                                    <td>{{$actividad_general->name}}</td>
                                    <td>{{$actividad_general->description}}</td>
                                    <td>{{$actividad->status ? "FINALIZADA" : "NO FINALIZADA"}}</td>
                                </tr>
                            @endif
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
