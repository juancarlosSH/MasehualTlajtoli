@extends('layouts.app')

@section('title', 'Actividad individual')

@section('content')
<h1>{{ $activity->name }}</h1>
<p>{{ $activity->description }}</p>
<p>{{ $activity->question }}</p>
<img src="{{ asset('/' . $activity->image->url) }}" alt="">
<form action="{{ route('login') }}" method="post">
    @csrf
    <label for="name">{{ __('Respuesta') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  minlength="3" maxlength="30">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <div>
            <button>
                {{ __('Revisar') }}
            </button>
        </div>
</form>
@endsection
