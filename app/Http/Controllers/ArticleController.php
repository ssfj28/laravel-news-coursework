<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Список новостей с пагинацией.
     */
    public function index()
    {
        $articles = Article::query()
            ->orderByDesc('id')
            ->paginate(5);

        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

    /**
     * Форма создания новости.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Сохранение новой новости.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['required', 'string'],
        ]);

        $article = Article::create($validated);

        return redirect()
            ->route('news.show', $article)
            ->with('success', 'Новость успешно создана.');
    }

    /**
     * Просмотр отдельной новости.
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }

    /**
     * Форма редактирования новости.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article,
        ]);
    }

    /**
     * Обновление новости.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['required', 'string'],
        ]);

        $article->update($validated);

        return redirect()
            ->route('news.show', $article)
            ->with('success', 'Новость успешно обновлена.');
    }

    /**
     * Удаление новости.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('news.index')
            ->with('success', 'Новость успешно удалена.');
    }
}
