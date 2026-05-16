<form method="POST" action="{{ route('register') }}">
    <div>
        <label>Enter your name</label>
        <input type="text" name="name" value="{{ old('name')}}" required>
    </div>
    <div>
        <label>Enter your E-mail</label>
        <input type="email" name="email" value="{{ old('email', 'example@mail.com') }}" required>
    </div>
    @error('email')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    <div>
        <label>Enter your password</label>
        <input type="password" name="password">
    </div>
    @error('password')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    <div>
        <label>Confirm your password</label>
        <input type="password" name="password_confirmation">
    </div>
    @error('password_confirmation')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    <div>
        <button type="submit">Register</button>
    </div>
</form>