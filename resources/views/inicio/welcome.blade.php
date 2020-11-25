<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Masehualtlajtoli</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/product/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <nav class="site-header sticky-top py-1">
  <div class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2 d-none d-md-inline-block" href="{{ route('register') }}">Registrarse</a>
    <a class="py-2 d-none d-md-inline-block" href="{{ route('login') }}">Iniciar sesión</a>
  </div>
</nav>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background-image: url('images/quetzal-background2.jpg'); background-repeat: no-repeat; background-size: cover;" >
  <div class="col-md-5 p-lg-5 mx-auto my-5" >
    <h1 class="display-4 font-weight-bold" style="color:white;">Masehualtlajtoli</h1>
    <p class="lead font-weight-normal" style="color:white;">Una aplicación web diseñada para el aprendizaje de lenguas indígenas</p>
    <a class="btn btn-primary" href="{{ route('register') }}" role="button">Empieza ahora</a>
  </div>
</div>

<footer class="page-footer font-small blue">
  <div class="footer-copyright text-center py-3">Aplicación desarrollada por
    <p><a href="https://github.com/RafaelAndrade17">Rafael Andrade Méndez</a> y 
       <a href="https://github.com/juancarlosSH">Juan Carlos Suarez Hernández</a>
    </p>
  </div>
</footer>
</html>