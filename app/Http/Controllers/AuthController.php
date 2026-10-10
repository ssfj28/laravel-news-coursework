<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Отображение страницы регистрации.
     */
    public function create()
    {
        return view('auth.signin');
    }

    /**
     * Проверка данных формы и формирование JSON-ответа.
     */
    public function registration(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        return response()->json([
            'message' => 'Данные успешно прошли валидацию.',
            'data' => [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => '[скрыт по соображениям безопасности]',
            ],
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
