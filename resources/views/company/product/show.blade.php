@extends('layouts.main')

@section('head')
    <title>{{ $product->title }}</title>
@endsection

@section('content')
    <main class="container">
        <article>
            <h1>{{ $product->title }} - {{ $product->company->title }}</h1>
            <img src="{{ $product->imageSrc }}" class="w-100 mt-3" alt="{{ $product->title }}" style="max-width: 520px;">
            <div class="mt-3">
                <p>
                    {{ $product->description }}
                </p>
            </div>
        </article>
    </main>
@endsection