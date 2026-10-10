
@extends('layouts.app')

@section('title', 'Регистрация — Городской вестник')

@section('content')
    <section class="auth-page">
        <div class="auth-card">
            <div class="auth-card-heading">
                <p class="auth-eyebrow">ЛИЧНЫЙ КАБИНЕТ</p>
                <h1>Регистрация</h1>
                <p>Заполните форму, чтобы продолжить.</p>
            </div>

            @if ($errors->any())
                <div class="auth-errors" role="alert">
                    <strong>Проверьте заполнение формы:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                class="auth-form"
                method="POST"
                action="{{ route('signin.registration') }}"
            >
                @csrf

                <div class="auth-field">
                    <label for="name">Имя</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        maxlength="255"
                        placeholder="Введите имя"
                        required
                    >
                </div>

                <div class="auth-field">
                    <label for="email">Электронная почта</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        maxlength="255"
                        placeholder="example@mail.com"
                        required
                    >
                </div>

                <div class="auth-field">
                    <label for="password">Пароль</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        autocomplete="new-password"
                        minlength="8"
                        maxlength="255"
                        placeholder="Не менее 8 символов"
                        required
                    >
                </div>

                <button class="auth-submit" type="submit">
                    Зарегистрироваться
                </button>
            </form>
        </div>
    </section>
@endsection
