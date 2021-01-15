@extends('layouts.app')

@section('title', 'Actividades del curso')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h1>Actividades {{$courseName}}</h1>
                        </div>
                        <div class="col" style="text-align:right;">
                            <a href="{{ route('inicio.home') }}" class="btn btn-success">Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                @if (empty($paginatedActivities))
                    <p>Actualmente no cuenta con actividades en el curso</p>
                @else
                <table class="table">
                  <thead class="thead-light">
                      <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Opciones</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($paginatedActivities as $activity)
                        <tr>
                            <td>{{$activity->name}}</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{$activity->status . '00%'}};" aria-valuenow="{{$activity->status . '00%'}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p style="text-align:center;">{{$activity->status . '00%'}}</p>
                            </td>
                            <td>
                                <a href="{{route('actividades.actividad',[$activity->courseSlug, $activity->slug])}}" class="btn btn-primary">{{ __('Acceder') }}</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
              @endif
              {{ $paginatedActivities->links() }}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
