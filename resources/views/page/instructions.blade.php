@extends('layouts.main')

@section('head')
    <title>Инструкции</title>
@endsection

@section('content')
<main class="container py-5">

    <h1 class="mb-4 text-center">Инструкции</h1>

    <section class="row g-4">

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">

                <div class="ratio ratio-16x9">
                    <video controls preload="none">
                        <source src="{{ asset('/videos/regsiter_edit_profile.mp4') }}" type="video/mp4">
                        Ваш браузер не поддерживает видео.
                    </video>
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Регистрация и настройка профиля</h5>
                </div>

            </div>
        </div>

    </section>

</main>
@endsection
