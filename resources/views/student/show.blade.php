@extends('layouts.main')



@section('head')

    <title>{{ $student->name }}</title>

@endsection



@section('content')

    <main class="container">

        <section>
            <a href="{{ route('students.index') }}">Назад</a>
            <h1>{{ $student->name }}</h1>

            <img src="{{ $student->image ? $student->imageSrc : asset('imgs/profile.jpg') }}" class="w-100 mt-3" alt="{{ $student->name }}" style="max-width: 320px;">

            <div class="mt-3">

                <p>

                    {{ $student->description }}

                </p>

            </div>

            <div class="mt-3">
                <strong>Портфолио и контакты:</strong>
            </div>

            <div class="mt-3 flex align-items-center flex-wrap gap-5">

                @if($student->whatsapp_url)

                    <a href="{{ $student->whatsapp_url }}" class="text-decoration-none" target="_blank" rel="noopener">

                        <img style="width: 35px" src="{{ asset('imgs/socials/whatsapp.svg') }}" alt="WhatsApp">

                    </a>

                @endif

                @if($student->telegram_url)

                    <a href="{{ $student->telegram_url }}" class="text-decoration-none" target="_blank" rel="noopener">

                        <img style="width: 35px" src="{{ asset('imgs/socials/telegram.svg') }}" alt="Telegram">

                    </a>

                @endif

                @if($student->instagram_url)

                    <a href="{{ $student->instagram_url }}" class="text-decoration-none" target="_blank" rel="noopener">

                        <img style="width: 35px" src="{{ asset('imgs/socials/instagram.svg') }}" alt="Instagram">

                    </a>

                @endif

                @if($student->youtube_url)

                    <a href="{{ $student->youtube_url }}" class="text-decoration-none" target="_blank" rel="noopener">

                        <img style="width: 35px" src="{{ asset('imgs/socials/youtube.svg') }}" alt="YouTube">

                    </a>

                @endif

                @if($student->tiktok_url)

                    <a href="{{ $student->tiktok_url }}" class="text-decoration-none" target="_blank" rel="noopener">

                        <img style="width: 35px" src="{{ asset('imgs/socials/tiktok.svg') }}" alt="TikTok">

                    </a>

                @endif

                @if($student->website_url)

                    <a href="{{ $student->website_url }}" class="text-decoration-none" target="_blank" rel="noopener">

                        <img style="width: 35px" src="{{ asset('imgs/socials/website.svg') }}" alt="Сайт">

                    </a>

                @endif

            </div>

        </section>

    </main>

@endsection