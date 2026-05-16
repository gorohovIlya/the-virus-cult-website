<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    @if (file_exists('resources/css/registration.css'))
        @vite([resources/css/registration.css])
    @else
        <style>
            body{
                background: black;
                margin: 0;
                padding: 0;
            }
            form{
                display: flex;
                justify-content: center;
                flex-direction: column;
                width: fit-content;
                margin-left: auto;
                margin-right: auto;
                gap: 12px;
                padding: 20px;
            }
            h1{
                color: white;
                text-align: center;
                font-size: 48px;
            }
            label{
                color: white;
            }
            form > div {
                display: flex;
                flex-direction: column;
                gap: 4px;
                width: 100%;
            }
            input, button {
                padding: 6px 8px;
                font-size: 1rem;
                color: white;
                background-color: #1a1a2e;
                border: #2b044b solid 3px;
                border-radius: 50px;
            }
            button{
                transition: all 0.3s ease;
            }
            form > div:has(input[type="checkbox"]) {
                flex-direction: row;
                align-items: center;
                gap: 8px;
            }
            
            input[type="checkbox"] {
                appearance: none;
                -webkit-appearance: none;
                width: 18px;
                height: 18px;
                background-color: #1a1a2e;
                border: #2b044b solid 3px;
                border-radius: 6px;
                cursor: pointer;
                position: relative;
                transition: all 0.2s ease;
                padding: 0;
                margin: 0;
            }
            
            input[type="checkbox"]:checked {
                background-color: #4a2d77;
                border-color: #b77cff;
            }
            
            input[type="checkbox"]:checked::after {
                content: "✓";
                position: absolute;
                color: white;
                font-size: 14px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-weight: bold;
            }
            
            input[type="checkbox"]:hover {
                border-color: #b77cff;
                transform: scale(1.05);
            }
            
            button:hover {
                background: linear-gradient(135deg, #4a2d77, #2a1a4a);
                border-color: #b77cff;
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(128, 0, 128, 0.4);
            }
                
            button:active {
                transform: translateY(1px);
            }       
        </style>
    @endif
</head>
<body>
    <h1>Registration</h1>
        <form method="POST" action="{{ route('register') }}">
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