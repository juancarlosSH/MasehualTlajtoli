@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica tu email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <p>Se ha enviado un correo de verificación a tu dirección de correo electrónico, verificala por favor</p>
                        </div>
                    @endif

                    <p>Antes de continuar, consulte su correo electrónico para ver si hay un enlace de verificación.</p>
                    <p>Si no recibió el correo electrónico</p>,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">haga clic aquí para solicitar otro</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
