@extends('layouts.app')

@section('title', 'Редактирование новости — Городской вестник')

@section('content')
    <section class="db-news-page">
        <div class="crud-form-card">
            <a class="crud-back-link"
               href="{{ route('news.show', $article) }}">
                ← К просмотру новости
            </a>

            <h1>Редактирование новости</h1>
            <p class="crud-subtitle">
                Измените необходимые поля и сохраните публикацию.
            </p>

            @if ($errors->any())
                <div class="crud-alert crud-alert-error">
                    <strong>Проверьте введённые данные:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="crud-form"
                  action="{{ route('news.update', $article) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="crud-field">
                    <label for="title">Заголовок *</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $article->title) }}"
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
                    >{{ old('excerpt', $article->excerpt) }}</textarea>
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
                    >{{ old('content', $article->content) }}</textarea>
                    @error('content')
                        <p class="crud-field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="crud-actions">
                    <button class="crud-button crud-button-primary"
                            type="submit">
                        Сохранить изменения
                    </button>

                    <a class="crud-button crud-button-secondary"
                       href="{{ route('news.show', $article) }}">
                        Отмена
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection
