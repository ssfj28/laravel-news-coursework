@extends('layouts.app')

@section('title', 'Создание новости — Городской вестник')

@section('content')
    <section class="db-news-page">
        <div class="crud-form-card">
            <a class="crud-back-link" href="{{ route('news.index') }}">
                ← К списку новостей
            </a>

            <h1>Создание новости</h1>
            <p class="crud-subtitle">Заполните поля для новой публикации.</p>

            @if ($errors->any())
                <div class="crud-alert crud-alert-error">
                    <strong>Не удалось сохранить новость.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="crud-form"
                  action="{{ route('news.store') }}"
                  method="POST">
                @csrf

                <div class="crud-field">
                    <label for="title">Заголовок *</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        maxlength="255"
                        required
                    >
                    @error('title')
                        <p class="crud-field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="crud-field">
                    <label for="excerpt">Краткое описание</label>
                    <textarea
                        id="excerpt"
                        name="excerpt"
                        rows="3"
                        maxlength="1000"
                    >{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="crud-field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="crud-field">
                    <label for="content">Текст новости *</label>
                    <textarea
                        id="content"
                        name="content"
                        rows="8"
                        required
                    >{{ old('content') }}</textarea>
                    @error('content')
                        <p class="crud-field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="crud-actions">
                    <button class="crud-button crud-button-primary"
                            type="submit">
                        Сохранить новость
                    </button>

                    <a class="crud-button crud-button-secondary"
                       href="{{ route('news.index') }}">
                        Отмена
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection
