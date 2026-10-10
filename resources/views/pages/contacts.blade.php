@extends('layouts.app')

@section('title', 'Контакты — Городской вестник')

@section('content')
    <section class="page-heading">
        <p class="eyebrow">МЫ НА СВЯЗИ</p>

        <h1>Контакты</h1>

        <p class="lead">
            Здесь размещена контактная информация учебного проекта.
            Данные передаются из маршрута и автоматически выводятся
            в виде списка.
        </p>
    </section>

    <section class="contacts-grid">
        @forelse ($contacts as $contact)
            <article class="contact-card">
                <p class="contact-label">{{ $contact['label'] }}</p>
                <p class="contact-value">{{ $contact['value'] }}</p>
            </article>
        @empty
            <p>Контактная информация пока не добавлена.</p>
        @endforelse
    </section>

    <p class="note">
        Контактные данные приведены в качестве примера
        для учебного проекта.
    </p>
@endsection