@extends('layouts.main')

@section('head')
    <title>{{ $student->name }}</title>
@endsection

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-center">
            <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
                <h3 class="text-center mb-4">{{ $student->name }}</h3>

                <div class="text-center mb-3">
                    <img src="{{ $student->image ? $student->imageSrc : asset('imgs/profile.jpg') }}" alt="{{ $student->name }}" class="rounded-circle mb-2" width="120" height="120">
                </div>

                
                <div>
                <div class="mb-3">
                    <div class="h5">Описание</div>
                    <div class="p">
                        {{ $student->description }}
                    </div>
                </div>
                <div class="mb-3">
                    <a href="{{ route('students.edit') }}" class="btn btn-primary">Редактировать профиль</a>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection