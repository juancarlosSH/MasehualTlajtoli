@extends('layouts.app')
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
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($actividades_disponibles as $actividad)
                      <tr>
                          <td>{{$actividad->name}}</td>
                          <td>{{$actividad->description}}</td>
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