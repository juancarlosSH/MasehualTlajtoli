@extends('layouts.app')

@section('title', 'Actividad individual')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#3490dc;">
                    <div class="row">
                        <div class="col" style="text-align:center;">
                            <h1 style="color:white;">{{ $activity->name }}</h1>
                        </div>
                    </div>                                  
                </div>
                <div class="card-body" style="text-align:center;">
                    <div class="row">
                        <div class="col">
                            <h4>{{ $activity->question }}</h4>
                        </div>
                    </div>           
                    <img src="{{ asset($activity->image->url) }}" width="256" height="256">
                    <form action="{{ route('login') }}" method="post" style="padding:8px;">
                        @csrf
                            <input id="response" type="text" class="form-control @error('response') is-invalid @enderror" name="response" value="{{ old('response') }}" required autocomplete="response" autofocus maxlength="15">
                                @error('response')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </form>
                    <div class="container" style="padding:8px;">
                        <button type="button" class="btn btn-success btn-lg">{{ __('Revisar') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
