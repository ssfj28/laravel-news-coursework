<?php

use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Страница «О нас»
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Страница «Контакты» с динамическим массивом данных
Route::get('/contacts', function () {
    $contacts = [
        [
            'label' => 'Электронная почта',
            'value' => 'editorial@city-news.example',
        ],
        [
            'label' => 'Телефон',
            'value' => '+7 (000) 000-00-00',
        ],
        [
            'label' => 'Адрес',
            'value' => 'г. Москва, ул. Примерная, 10',
        ],
        [
            'label' => 'Время работы',
            'value' => 'Понедельник–пятница, 09:00–18:00',
        ],
    ];

    return view('pages.contacts', [
        'contacts' => $contacts,
    ]);
})->name('contacts');