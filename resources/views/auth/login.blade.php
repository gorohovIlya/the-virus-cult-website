<form method="POST" action="{{ route('login') }}">
    @csrf <!-- Критически важно для защиты от CSRF-атак -->

    <h1>Вход в систему</h1>

    <div class="form-group">
        <label for="email">E-mail адрес</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password" required>
        @error('password')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label>
            <input type="checkbox" name="remember"> Запомнить меня
        </label>
    </div>

    <button type="submit">Войти</button>

    <p>
        Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a>
    </p>
</form>