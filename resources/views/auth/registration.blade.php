<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    @vite(['resources/css/registration.css'])
</head>
<body>
    <h1>Registration</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label>Nickname:</label>
                <input type="text" name="name" value="{{ old('name')}}">
            </div>
            <div>
                <label>EMAIL:</label>
                <input type="text" name="email" value="{{ old('email', 'example@mail.com') }}">
            </div>
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <div>
                <label>Password:</label>
                <input type="password" name="password">
            </div>
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <div>
                <label>Repeat password:</label>
                <input type="password" name="password_confirmation">
            </div>
            @error('password_confirmation')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <div>
                <label class="form-check-label" for="newsletter">
                    Do you want to receive the newsletter:
                </label>
                <input
                    type="checkbox" 
                    name="newsletter" 
                    id="newsletter" 
                    class="form-check-input"
                    value="1"
                    {{ old('newsletter') ? 'checked' : '' }} 
                >
            </div>
            <div>
                @csrf
                <button type="submit">Register</button>
            </div>
        <p style="color: #fff">
            Already have an account? <a href="{{ route('login') }}">Log in</a>
        </p>
        </form>
</body>
</html>