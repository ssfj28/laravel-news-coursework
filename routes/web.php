<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

// Главная страница: получение публикаций из JSON
Route::get('/', [MainController::class, 'index'])
    ->name('home');

// Страница «О нас»
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Страница «Контакты»
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

// Страница просмотра полноразмерного изображения
Route::get('/galery/{id}', [MainController::class, 'show'])
    ->whereNumber('id')
    ->name('galery.show');
    // Страница регистрации
Route::get('/signin', [AuthController::class, 'create'])
    ->name('signin.create');

// Обработка формы регистрации
Route::post('/signin', [AuthController::class, 'registration'])
    ->name('signin.registration');

    // Список новостей из базы данных
Route::get('/news', [ArticleController::class, 'index'])
    ->name('news.index');