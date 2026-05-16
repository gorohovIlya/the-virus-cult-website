<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Успешная регистрация</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <!-- Отображение имени пользователя -->
        <h1>Поздравляем, {{ Auth::user()->name }}!</h1>
        
        <p>Ваш аккаунт успешно активирован. Теперь вам доступны все функции системы.</p>

        <div style="margin-top: 20px;">
            <!-- Кнопка "На главную" -->
            <a href="{{ url('/') }}" style="padding: 10px 20px; background: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">
                На главную
            </a>
        </div>
    </div>
</body>
</html>