<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    @vite(['resources/css/about-us.css', 'resources/css/links-style.css'])
</head>
<body>
    <header>
        <div class="img"><h1>The Virus Cult</h1></div>
        <div>
            <h1 class="link-hover">
                <a href="{{ route('main-page') }}">Home</a>
            </h1>
        </div>
        <div>
            <h1 class="link-hover">
                <a href="{{ route('download') }}">Download</a>
            </h1>
        </div>
        <div>
            <h1 class="link-hover">
                <a href="{{ route('feedback') }}">Feedback</a>
            </h1>
        </div>
        <div>
            <h1 class="link-hover">
                <a href="{{ route('support-us') }}">Support Us</a>
            </h1>
        </div>
        <div>
            <h1 class="link-hover">
                <a href="{{ route('about-us') }}">About Us</a>
            </h1>
        </div>
        @auth
            <div>
                <h1 class="link-hover">
                    <a href="/personal-account">{{ Auth::user()->name }}</a>
                </h1>
            </div>
        @else
            <div>
                <h1 class="link-hover">
                    <a href="{{ route('login') }}">Log in</a>
                </h1>
            </div>
        @endauth
    </header>
    <main>
        <div class="text__1">
            <div class="name">
                <p>In this section we will tell you about ourselves</p>
            </div>
        </div>
        <div class="text__2">
            <div class="plot">
                <h1>Ilya Gorokhov</h1>
                <p>Our web developer and creator of all the puzzles for our novel. And also just a cool guy.</p>
            </div>
        </div>
        <div class="text__2">
            <div class="plot">
                <h1>Marya Savelyeva</h1>
                <p>Our background artist and also the head of our team.</p>
            </div>
        </div>
        <div class="text__2">
            <div class="plot">
                <h1>Maria Henoh</h1>
                <p>Our artist who worked on all the characters. (They're absolutely amazing!!!)</p>
            </div>
        </div>
        <div class="text__2">
            <div class="plot">
                <h1>Sergey Pleskunov</h1>
                <p>The person who came up with the game's entire lore and created the website's frontend. (No AI was used for the story.)</p>
            </div>
        </div>
    </main>
    <footer>
        <p class="text_for_footer">The Virus Cult</p>
    </footer>
</body>
</html>