<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Account</title>
</head>
<body>
    @vite(['resources/css/personal-account.css'])
    <p> Hi, {{ Auth::user()->name }}! </p>
    <p> Your E-mail: {{ Auth::user()->email }} </p>
    <p>
        <a href="{{ route('main-page') }}">Return to main</a>
    </p>
     <form method="GET" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" class="underline text-red-500">Log out</button>
    </form>
</body>