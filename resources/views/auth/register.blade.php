@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <form class="form-signin" method="post" action="{{ route('register') }}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
        <div class="form-group">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="name" name="name" class="form-control" placeholder="Имя" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autocomplete="no">
        </div>
        <div class="form-group">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="password" name="password" class="form-control" placeholder="Пароль">
        </div>
        <div class="form-group">
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="password" name="password_confirmation" class="form-control" placeholder="Повторите пароль">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
    </form>
@endsection
