@extends('layouts.app')

@section('title', $article->title . ' — Городской вестник')

@section('content')
    <section class="db-news-page">
        <article class="crud-form-card">
            <a class="crud-back-link" href="{{ route('news.index') }}">
                ← К списку новостей
            </a>

            @if (session('success'))
                <div class="crud-alert crud-alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="db-news-card-header">
                <span class="db-news-label">НОВОСТЬ №{{ $article->id }}</span>

                <time>
                    {{ $article->created_at?->format('d.m.Y H:i') ?? 'Дата не указана' }}
                </time>
            </div>

            <h1 class="crud-article-title">{{ $article->title }}</h1>

            @if ($article->excerpt)
                <p class="crud-article-excerpt">{{ $article->excerpt }}</p>
            @endif

            <div class="crud-article-content">{{ $article->content }}</div>

            <div class="crud-actions crud-detail-actions">
                <a class="crud-button crud-button-primary"
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
    </section>
@endsection
