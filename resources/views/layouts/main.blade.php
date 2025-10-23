<!DOCTYPE html>

<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/js/app.js'])
    @yield('head')
</head>

<body>

    <header class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">

            <div>

                <span style="font-weight: 300; color: #0088cb; font-size:1.5em">Консорциум</span>

                <!--<span style="font-weight: 300; color: #f9576c; font-size:1.5em;">Center</span>-->

            </div>

        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

            <li><a href="{{ route('companies.index') }}" class="nav-link px-2 link-dark">Компании</a></li>

            <li><a href="{{ route('students.index') }}" class="nav-link px-2 link-dark">Студенты</a></li>

            <li><a href="{{ route('pages.instructions') }}" class="nav-link px-2 link-dark">Инструкция</a></li>
        </ul>


        @guest
            <div class="col-md-3 text-end">

     

                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Войти</a>

                    <a href="{{ route('register') }}" class="btn btn-primary">Зарегистрироваться</a>  



            </div>
        @endguest


        @auth
            <div class="d-flex gap-3">
                <a href="{{ route('students.dashboard') }}" class="btn btn-outline-primary me-2">Профиль</a>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button class="btn btn-primary">Выйти</button>

                </form>

            </div>
        @endauth

    </header>



    @yield('content')



    <footer class="container d-flex justify-content-center border-top pt-3 mt-3">

        <strong class="text-center">©BusinessZhol - 2025 - Все права защищены.</strong>

    </footer>

    @yield('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

