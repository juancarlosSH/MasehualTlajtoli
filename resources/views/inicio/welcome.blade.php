@extends('layouts.app')

@section('title', 'Bienvenido')

@section('style')
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
</style>
@endsection

@section('content')
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background-image: url('images/quetzal-background2.jpg'); background-repeat: no-repeat; background-size: cover;" >
    <div class="col-md-5 p-lg-5 mx-auto my-5" >
        <h1 class="display-4 font-weight-bold" style="color:white;">Masehualtlajtoli</h1>
        <p class="lead font-weight-normal" style="color:white;">Una aplicación web diseñada para el aprendizaje de lenguas indígenas</p>
        <a class="btn btn-primary" href="{{ route('register') }}" role="button">Empieza ahora</a>
    </div>
</div>
@endsection
