@extends('layouts.main')

@section('head')
    <title>Регистрация</title>
@endsection

@section('content')
    <div class="container d-flex justify-content-center">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="text-center mb-3">
                <div class="h3">Регистрация</div>
            </div>
            <div class="mb-3">
                <label for="InputName" class="form-label">Ваше имя</label>
                <input name="name" type="text" class="form-control" id="InputName" placeholder="Борис Кузнецов" required value="{{ old('name') }}">
                @error('name')
                    <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Адрес электронной почты</label>
                <input name="email" type="email" class="form-control" id="InputEmail" placeholder="example@gmail.com" required value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Придумайте пароль</label>
                <input name="password" type="password" class="form-control" id="InputPassword" placeholder="qwerty1234" required>
                @error('password')
                    <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputPasswordConfirmation" class="form-label">Потвердите пароль</label>
                <input name="password_confirmation" type="password" class="form-control" id="InputPasswordConfirmation" placeholder="qwerty1234" required>
                @error('password_confirmation')
                    <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
                @if(session('status'))
                    <p class="text-danger mt-1">{{ session('status') }}</p>
                @endif
            </div>
            <div class="text-center mb-3">
                <div class="form-text mb-3">Уже зарегистрированы? <a href="{{ route('login') }}">Войдите</a></div>
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>    
            </div>
        </form>
    </div>
@endsection