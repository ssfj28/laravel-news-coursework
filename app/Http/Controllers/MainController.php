<?php

namespace App\Http\Controllers;

class MainController extends Controller
{

    public function index()
    {
        $path = public_path('articles.json');

        if (!file_exists($path)) {
            abort(404, 'Файл articles.json не найден.');
        }

        $articles = json_decode(file_get_contents($path), true);

        if (!is_array($articles)) {
            abort(500, 'Не удалось прочитать данные публикаций.');
        }

        return view('pages.home', [
            'articles' => $articles,
        ]);
    }

    /**
     * Отображение отдельной публикации с полноразмерным изображением.
     */
    public function show($id)
    {
        $path = public_path('articles.json');

        if (!file_exists($path)) {
            abort(404, 'Файл articles.json не найден.');
        }

        $articles = json_decode(file_get_contents($path), true);

        if (!is_array($articles) || !isset($articles[$id])) {
            abort(404, 'Публикация не найдена.');
        }

        return view('pages.galery', [
            'article' => $articles[$id],
        ]);
    }
}