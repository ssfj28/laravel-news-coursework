@extends('layouts.app')

@section('title', 'Главная — Городской вестник')

@section('content')
    <section class="hero">
        <p class="eyebrow">НОВОСТИ · СОБЫТИЯ · ЛЮДИ</p>

        <h1>Город начинается с новостей</h1>

        <p class="hero-copy">
            Добро пожаловать на сайт «Городской вестник» —
            учебный проект новостного портала о событиях,
            культуре, технологиях и жизни общества.
        </p>

        <div class="hero-actions">
            <a class="button" href="{{ route('about') }}">
                О нашем проекте
            </a>

            <a class="button button-light" href="{{ route('contacts') }}">
                Связаться с нами
            </a>
        </div>
    </section>

    <section class="topics-section">
        <p class="eyebrow">ОТКРЫВАЙТЕ НОВОЕ</p>

        <h2>В центре внимания</h2>

        <p class="section-description">
            Мы готовим платформу, на которой в дальнейшем будут
            публиковаться новости и тематические материалы.
        </p>

        <div class="topic-grid">
            <article class="topic-card">
                <span class="topic-number">01</span>
                <h3>Город</h3>
                <p>События, инициативы и изменения в городской жизни.</p>
            </article>

            <article class="topic-card">
                <span class="topic-number">02</span>
                <h3>Культура</h3>
                <p>Выставки, творческие проекты и культурные события.</p>
            </article>

            <article class="topic-card">
                <span class="topic-number">03</span>
                <h3>Технологии</h3>
                <p>Новые идеи, цифровые решения и современные разработки.</p>
            </article>
        </div>
    </section>
@endsection