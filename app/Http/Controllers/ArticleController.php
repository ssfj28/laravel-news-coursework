<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Отображение списка новостей из базы данных.
     */
    public function index()
    {
        $articles = Article::query()
            ->orderByDesc('id')
            ->get();

        return view('articles.index', [
            'articles' => $articles,
        ]);
    }
}
