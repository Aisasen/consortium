@extends('layouts.main')



@section('head')

    <title>Best Center - Консорциум</title>

@endsection



@section('content')

    <div class="container">

        <div class="container-fluid">

            <div class="row">



                <aside class="col-md-3 col-lg-2 border-end d-none d-md-block p-3">

                    <h5>Фильтры</h5>

                    <form method="GET" action="{{ route('companies.index') }}">

                        <div class="mb-3">

                            <label for="country_id" class="form-label">Страна</label>

                            <select name="country_id" id="country_id" class="form-select">

                                <option value="">Все</option>

                                @foreach($countries as $country)

                                    <option value="{{ $country->id }}" @selected(($data['country_id'] ?? '') == $country->id)>{{ $country->title }}</option>

                                @endforeach

                            </select>

                        </div>

                        <div class="mb-3">

                            <label for="city_id" class="form-label">Город</label>

                            <select name="city_id" id="city_id" class="form-select">

                                <option value="">Все</option>

                                @foreach($cities as $city)

                                    <option value="{{ $city->id }}" @selected(($data['city_id'] ?? '') == $city->id)>{{ $city->title }}</option>

                                @endforeach

                            </select>

                        </div>

                        <h6>Категории</h6>

                        <div class="mt-3">

                            <div class="list-group">

                                @foreach($categories as $category)

                                    <a href="{{ route('companies.index', array_merge($data, ['category_id' => $category->id])) }}"

                                    class="list-group-item list-group-item-action fw-bold">

                                        {{ $category->title }}

                                    </a>

                                    @if($category->subCategories && $category->subCategories->count())

                                        @foreach($category->subCategories as $sub)

                                            <a href="{{ route('companies.index', array_merge($data, ['sub_category_id' => $sub->id, 'category_id' => $category->id])) }}"

                                            class="list-group-item list-group-item-action ps-4">

                                                {{ $sub->title }}

                                            </a>

                                        @endforeach

                                    @endif

                                @endforeach

                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-3">Показать</button>

                    </form>

                    <hr>

                </aside>



                <main class="col-md-9 col-lg-10 p-3">

                    <button class="btn btn-outline-secondary mb-3 d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#asideFilters" aria-controls="asideFilters">

                        Фильтры

                    </button>



                    <section class="mt-3">

                        <h1 class="text-center">Компании {{ $currentCategory ? ' - '.$currentCategory->title : '' }} {{ $currentSubCategory ? ' - '.$currentSubCategory->title : '' }}</h1>

                        <div class="d-flex flex-wrap justify-content-center justify-content-md-between gap-3">

                            @forelse($companies as $company)
                                <a href="{{ route('companies.show', $company->id) }}" 
                                   class="card text-decoration-none" style="width: 18rem;">

                                    <div style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center; background: #f8f9fa;">
                                        <img src="{{ $company->imageSrc ?? '/imgs/companies/1.jpg' }}" 
                                             alt="{{ $company->title }}" 
                                             style="max-height: 100%; max-width: 100%; object-fit: contain; height: 200px;"
                                             loading="lazy">
                                    </div>

                                    <div class="card-body">
                                        <p class="card-text text-center fw-bold text-decoration-none">
                                            {{ $company->title }}
                                        </p>
                                    </div>
                                </a>
                            @empty

                                <p>Компании не найдены.</p>

                            @endforelse

                        </div>

                        <div class="mt-3">

                            {{ $companies->withQueryString()->links() }}

                        </div>

                    </section>

                </main>

            </div>

        </div>



        <aside class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="asideFilters" aria-labelledby="asideFiltersLabel">

            <div class="offcanvas-header">

                <h5 class="offcanvas-title" id="asideFiltersLabel">Фильтры</h5>

                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>

            </div>

            <div class="offcanvas-body">

                <form method="GET" action="{{ route('companies.index') }}">

                    <div class="mb-3">

                        <label for="country_id_mobile" class="form-label">Страна</label>

                        <select name="country_id" id="country_id_mobile" class="form-select bg-white text-dark">

                            <option value="">Все</option>

                            @foreach($countries as $country)

                                <option value="{{ $country->id }}" @selected(($data['country_id'] ?? '') == $country->id)>{{ $country->title }}</option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label for="city_id_mobile" class="form-label">Город</label>

                        <select name="city_id" id="city_id_mobile" class="form-select bg-white text-dark">

                            <option value="">Все</option>

                            @foreach($cities as $city)

                                <option value="{{ $city->id }}" @selected(($data['city_id'] ?? '') == $city->id)>{{ $city->title }}</option>

                            @endforeach

                        </select>

                    </div>

                    <h6>Категории</h6>

                    <div class="mt-3">

                        <div class="list-group">

                            @foreach($categories as $category)

                                <a href="{{ route('companies.index', array_merge($data, ['category_id' => $category->id])) }}"

                                class="list-group-item list-group-item-action fw-bold

                                {{ ($data['category_id'] ?? null) == $category->id ? 'active' : '' }}">

                                    {{ $category->title }}

                                </a>

                                @if($category->subCategories && $category->subCategories->count())

                                    @foreach($category->subCategories as $sub)

                                        <a href="{{ route('companies.index', array_merge($data, ['sub_category_id' => $sub->id, 'category_id' => $category->id])) }}"

                                        class="list-group-item list-group-item-action ps-4

                                        {{ ($data['sub_category_id'] ?? null) == $sub->id ? 'active' : '' }}">

                                            {{ $sub->title }}

                                        </a>

                                    @endforeach

                                @endif

                            @endforeach

                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Показать</button>

                </form>

            </div>

        </aside>

    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    const countriesDes = document.getElementById('country_id')
    const citiesSelectDes = document.getElementById('city_id')

    const countriesMob = document.getElementById('country_id_mobile')
    const citiesSelectMob = document.getElementById('city_id_mobile')

    let cities = []

    const getCities = async (countryId) => {
        try {
            const response = await axios.get(`/api/countries/${countryId}/cities`)
            return response.data.data
        } catch (error) {
            console.error('Ошибка при загрузке городов:', error)
            return []
        }
    }


    countriesDes.addEventListener('change', async function () {
        let selectedCountryId = this.value

        console.log(selectedCountryId)

        cities = await getCities(selectedCountryId)

        citiesSelectDes.innerHTML = '<option value="">Все</option>'
        console.log(cities);
        cities.forEach(city => {
            let option = document.createElement('option')
            option.value = city.id
            option.textContent = city.title
            citiesSelectDes.appendChild(option)
        })
    })

    countriesMob.addEventListener('change', async function () {
        let selectedCountryId = this.value

        console.log(selectedCountryId)

        cities = await getCities(selectedCountryId)

        citiesSelectMob.innerHTML = '<option value="">Все</option>'
        console.log(cities);
        cities.forEach(city => {
            let option = document.createElement('option')
            option.value = city.id
            option.textContent = city.title
            citiesSelectMob.appendChild(option)
        })
    })


</script>
@endsection