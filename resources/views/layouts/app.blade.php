<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Городской вестник')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="site-shell">
        <header class="site-header">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark">ГВ</span>
                <span class="brand-text">
                    <strong>Городской</strong>
                    <span>вестник</span>
                </span>
            </a>

            <nav class="site-nav" aria-label="Основная навигация">
                <a class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}"
                   href="{{ route('home') }}">Главная</a>

                <a class="nav-link {{ request()->routeIs('about') ? 'is-active' : '' }}"
                   href="{{ route('about') }}">О нас</a>

                <a class="nav-link {{ request()->routeIs('contacts') ? 'is-active' : '' }}"
                   href="{{ route('contacts') }}">Контакты</a>
            </nav>
        </header>

        <main class="site-main">
            @yield('content')
        </main>

        <footer class="site-footer">
            <div>
                <p class="footer-title">Городской вестник</p>
                <p class="footer-note">Учебный проект на Laravel</p>
            </div>

            <p class="footer-author">
                Максим Емельянов<br>
                Группа: 243-323
            </p>
        </footer>
    </div>
</body>
</html>