@extends('layouts.main')



@section('head')

    <title>{{ $company->title }}</title>

@endsection



@section('content')

    <main class="container">

        <section>
            <a href="{{ route('companies.index') }}">Назад</a>
            <h1 class="text-center">{{ $company->title }}</h1>

            <div class="row mt-3 align-items-center">

                <div class="col-12 col-md-6 mb-3 mb-md-0">

                    <img src="{{ $company->imageSrc }}" class="w-100" alt="{{ $company->title }}" style="max-width: 520px;">

                </div>

                <div class="col-12 col-md-6">

                    <ol class="list-group">

                        <li class="list-group-item"><b>Название: </b><span>{{ $company->title }}</span></li>

                        <li class="list-group-item"><b>Деятельность: </b><span>{{ $company?->subcategory?->category?->title }}</span></li>

                        <li class="list-group-item"><b>Телефон: </b><span>{{ $company->phone }}</span></li>

                        <li class="list-group-item"><b>Почта: </b><span>{{ $company->email }}</span></li>

                        <li class="list-group-item"><b>Страна: </b><span>{{ $company->city->country->title }}</span></li>

                        <li class="list-group-item"><b>Город: </b><span>{{ $company->city->title }}</span></li>

                        <li class="list-group-item"><b>Адрес: </b><span>{{ $company->address }}</span></li>

                        <li class="list-group-item"><b>Сайт: </b><span>{{ $company->site ?? '-' }}</span></li>

                    </ol>

                </div>

            </div>

            <div class="mt-3">

                {!! $company->description !!}

            </div>

        </section>

        @if($products->isNotEmpty())

            <section class="mt-3">

                <h2>Продукция</h2>

                <div class="d-flex flex-wrap justify-content-between gap-3">

                    @forelse($products as $product)

                        <a href="{{ route('companies.products.show', ['company' => $company->id, 'product' => $product->id]) }}" class="card text-decoration-none" style="width: 18rem;">

                            <img src="{{ $product->imageSrc }}" class="card-img-top" alt="{{ $product->title }}">

                            <div class="card-body">

                                <p class="card-text text-center fw-bold text-decoration-none">{{ $product->title }}</p>

                            </div>

                        </a>

                    @empty

                        <p>Продукция не найдена</p>

                    @endforelse

                </div>

                <div class="mt-3">

                    {{ $products->links() }}

                </div>

            </section>

        @endif

    </main>

@endsection