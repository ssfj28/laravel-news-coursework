@extends('layouts.app')

@section('title', 'Главная — Городской вестник')

@section('content')
    <section class="news-heading">
        <p class="eyebrow">НОВОСТИ · СОБЫТИЯ · ЛЮДИ</p>

        <h1>Последние публикации</h1>

        <p class="section-description">
            Материалы новостного портала о событиях,
            культуре, технологиях и жизни общества.
        </p>
    </section>

    <section class="news-grid">
        @forelse ($articles as $index => $article)
            <article class="news-card">
                <a
                    class="news-image-link"
                    href="{{ route('galery.show', ['id' => $index]) }}"
                    aria-label="Открыть публикацию: {{ $article['name'] }}"
                >
                    <img
                        class="news-image"
                        src="{{ asset('images/' . $article['preview_image']) }}"
                        alt="{{ $article['name'] }}"
                    >
                </a>

                <div class="news-card-content">
                    <p class="news-date">{{ $article['date'] }}</p>

                    <h2>
                        <a href="{{ route('galery.show', ['id' => $index]) }}">
                            {{ $article['name'] }}
                        </a>
                    </h2>

                    <p class="news-description">
                        {{ $article['shortDesc'] ?? \Illuminate\Support\Str::limit($article['desc'] ?? '', 160) }}
                    </p>

                    <a
                        class="news-read-more"
                        href="{{ route('galery.show', ['id' => $index]) }}"
                    >
                        Читать далее →
                    </a>
                </div>
            </article>
        @empty
            <p>Публикации пока отсутствуют.</p>
        @endforelse
    </section>
@endsection