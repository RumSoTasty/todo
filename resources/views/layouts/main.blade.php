<!DOCTYPE html>
<html lang="ru">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        </a>
        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            @guest
                @if (Route::has('login'))
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route("login") }}">Войти</a>
                @endif
                @if (Route::has('register'))
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route("register") }}">Регистрация</a>
                @endif
            @else
                <a id="navbarDropdown" class="me-3 py-2 text-alert text-decoration-none" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="/todo">Todo</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="/todo/donelist">Завёршённые </a>
            <a class="me-3 py-2 text-danger text-decoration-none" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Выйти') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @endguest
        </nav>
    </div>

    <div class="main-content">
        @yield('main_content')
    </div>


    <style>
        .main-content{
            margin-left: 125px;
            margin-right: 125px;
        } 
    </style>
</body>
</html>