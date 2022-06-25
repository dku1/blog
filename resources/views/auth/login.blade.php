@extends('layouts.app')

@section('title', 'Вход')

@section('content')
    <form class="form-signin" method="post" action="{{ route('login') }}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
        <div class="form-group">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="password" name="password" class="form-control" placeholder="Пароль">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>
@endsection
