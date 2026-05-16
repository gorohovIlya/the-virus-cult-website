<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    @vite(['resources/css/authorization.css'])
</head>
<body>
    <h1>Authorization</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label>EMAIL:</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
            @error('password')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit">Log in</button>
        </div>
        <p style="color: #fff">
            Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a>
        </p>
    </form>
</body>
</html>