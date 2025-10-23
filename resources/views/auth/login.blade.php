@extends('layouts.main')

@section('head')
    <title>Войти</title>
@endsection

@section('content')
    <div class="container d-flex justify-content-center">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="text-center mb-3">
                <div class="h3">Войти</div>
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Адрес электронной почты</label>
                <input name="email" type="email" class="form-control" id="InputEmail" placeholder="example@gmail.com" required value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Ваш пароль</label>
                <input name="password" type="password" class="form-control" id="InputPassword" placeholder="qwerty1234" required>
                @error('password')
                    <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            @if(session('status'))
                <p class="text-danger mt-1">{{ session('status') }}</p>
            @endif
            <div class="">
                <div class="form-text mb-3">Нет аккаунта? <a href="{{ route('register') }}">Зарегистрируйтесь</a></div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Войти</button>    
        </form>
    </div>
@endsection