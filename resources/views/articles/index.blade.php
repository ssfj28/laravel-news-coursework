
@extends('layouts.app')

@section('title', 'Новости — Городской вестник')

@section('content')
    <section class="db-news-page">
        <header class="db-news-heading">
            <p class="db-news-eyebrow">РЕДАКЦИЯ</p>
            <h1>Управление новостями</h1>
            <p>Создавайте, просматривайте, редактируйте и удаляйте публикации.</p>

            <a class="crud-button crud-button-primary"
               href="{{ route('news.create') }}">
                + Создать новость
            </a>
        </header>

        @if (session('success'))
            <div class="crud-alert crud-alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="db-news-list">
            @forelse ($articles as $article)
                <article class="db-news-card">
                    <div class="db-news-card-header">
                        <span class="db-news-label">НОВОСТЬ №{{ $article->id }}</span>

                        <time>
                            {{ $article->created_at?->format('d.m.Y') ?? 'Дата не указана' }}
                        </time>
                    </div>

                    <h2>{{ $article->title }}</h2>

                    <p class="db-news-excerpt">
                        {{ $article->excerpt ?: \Illuminate\Support\Str::limit($article->content, 180) }}
                    </p>

                    <div class="crud-actions">
                        <a class="crud-button crud-button-secondary"
                           href="{{ route('news.show', $article) }}">
                            Просмотр
                        </a>

                        <a class="crud-button crud-button-secondary"
                           href="{{ route('news.edit', $article) }}">
                            Редактировать
                        </a>

                        <form action="{{ route('news.destroy', $article) }}"
                              method="POST"
                              onsubmit="return confirm('Удалить эту новость?')">
                            @csrf
                            @method('DELETE')

                            <button class="crud-button crud-button-danger"
                                    type="submit">
                                Удалить
                            </button>
                        </form>
                    </div>
                </article>
            @empty
                <div class="db-news-empty">
                    <h2>Публикаций пока нет</h2>
                    <p>Создайте первую новость, нажав кнопку выше.</p>
                </div>
            @endforelse
        </div>

        @if ($articles->hasPages())
            <div class="db-news-pagination">
                {{ $articles->links() }}
            </div>
        @endif
    </section>
@endsection
