@extends('layouts.main')

@section('head')
    <title>{{ $student->name }}</title>
@endsection

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-center">
            <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
                <h3 class="text-center mb-4">Редактирование профиля</h3>

                <div class="text-center mb-3">
                    <img src="{{ $student->image ? $student->imageSrc : asset('imgs/profile.jpg') }}" alt="Фото профиля" class="rounded-circle mb-2" width="120" height="120">
                <div>
                </div>
            </div>

          
        <form method="POST" action="{{ route('students.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Введите имя" value="{{ old('name', $student->name) }}" required>
            @error('name')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Введите email" value="{{ old('email', $student->email) }}" required>
            @error('email')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
            <label for="formFile" class="form-label">Фото профиля</label>
            <input class="form-control" type="file" id="formFile" name="image" accept="image/*">
            @error('image')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Введите новый пароль">
            @error('password')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Расскажите о себе">{{ old('description', $student->description) }}</textarea>
            @error('description')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
            <label for="whatsapp_url" class="form-label">WhatsApp</label>
            <input name="whatsapp_url" type="url" class="form-control" id="whatsapp_url" placeholder="Ссылка на WhatsApp" value="{{ old('whatsapp_url', $student->whatsapp_url) }}">
            @error('whatsapp_url')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
            <label for="telegram_url" class="form-label">Telegram</label>
            <input name="telegram_url" type="url" class="form-control" id="telegram_url" placeholder="Ссылка на Telegram" value="{{ old('telegram_url', $student->telegram_url) }}">
            @error('telegram_url')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
            <label for="instagram_url" class="form-label">Instagram</label>
            <input name="instagram_url" type="url" class="form-control" id="instagram_url" placeholder="Ссылка на Instagram" value="{{ old('instagram_url', $student->instagram_url) }}">
            @error('instagram_url')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
            <label for="youtube_url" class="form-label">YouTube</label>
            <input name="youtube_url" type="url" class="form-control" id="youtube_url" placeholder="Ссылка на YouTube" value="{{ old('youtube_url', $student->youtube_url) }}">
            @error('youtube_url')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
            <label for="tiktok_url" class="form-label">TikTok</label>
            <input name="tiktok_url" type="url" class="form-control" id="tiktok_url" placeholder="Ссылка на TikTok" value="{{ old('tiktok_url', $student->tiktok_url) }}">
            @error('tiktok_url')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
            <label for="website_url" class="form-label">Веб-сайт</label>
            <input name="website_url" type="url" class="form-control" id="website_url" placeholder="Ссылка на сайт" value="{{ old('website_url', $student->website_url) }}">
            @error('website_url')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Сохранить изменения</button>
        </form>
        </div>
      </div>
    </div>
@endsection