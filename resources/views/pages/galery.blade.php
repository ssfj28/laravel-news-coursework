@extends('layouts.app')

@section('title', $article['name'] . ' — Городской вестник')

@section('content')
    <article class="article-detail">
        <a class="back-link" href="{{ route('home') }}">
            ← Все публикации
        </a>

        <header class="article-detail-header">
            <p class="article-date">{{ $article['date'] }}</p>

            <h1>{{ $article['name'] }}</h1>
        </header>

        @if (!empty($article['full_image']))
            <figure class="article-image-wrap">
                <img
                    class="article-full-image"
                    src="{{ asset('images/' . $article['full_image']) }}"
                    alt="{{ $article['name'] }}"
                >
            </figure>
        @endif

        <div class="article-body">
            {{ $article['desc'] ?? $article['shortDesc'] ?? 'Описание отсутствует.' }}
        </div>
    </article>
@endsection