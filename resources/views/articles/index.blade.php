
@extends('layouts.app')

@section('title', 'Новости из базы данных — Городской вестник')

@section('content')
    <section class="db-news-page">
        <header class="db-news-heading">
            <p class="db-news-eyebrow">БАЗА ДАННЫХ</p>
            <h1>Новости</h1>
            <p>Публикации, сохранённые в таблице articles.</p>
        </header>

        <div class="db-news-list">
            @forelse ($articles as $article)
                <article class="db-news-card">
                    <div class="db-news-card-header">
                        <span class="db-news-label">НОВОСТЬ</span>

                        <time>
                            {{ $article->created_at?->format('d.m.Y') ?? 'Дата не указана' }}
                        </time>
                    </div>

                    <h2>{{ $article->title }}</h2>

                    <p class="db-news-excerpt">
                        {{ $article->excerpt ?: \Illuminate\Support\Str::limit($article->content, 180) }}
                    </p>

                    <div class="db-news-content">
                        {{ \Illuminate\Support\Str::limit($article->content, 240) }}
                    </div>
                </article>
            @empty
                <div class="db-news-empty">
                    <h2>Публикаций пока нет</h2>
                    <p>Добавьте новости в базу данных, чтобы они появились здесь.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
