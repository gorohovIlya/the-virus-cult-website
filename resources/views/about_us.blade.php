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
        <!-- <div>
            <h1 class="link-hover">
                <a href="{{ route('our-plans') }}">Plans</a>
            </h1>
        </div> -->
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
                <h1>Name</h1>
                <p>The visual novel takes place in Berkeley. The main character, Helen, witnesses strange events unfolding at the Institute of Solar-Terrestrial Physics. She meets Liliana, a resistance member fighting a virus cult. Helen decides to join her. Let's see what happens next.</p>
            </div>
        </div>
        <div class="text__2">
            <div class="plot">
                <h1>Name</h1>
                <p>The visual novel takes place in Berkeley. The main character, Helen, witnesses strange events unfolding at the Institute of Solar-Terrestrial Physics. She meets Liliana, a resistance member fighting a virus cult. Helen decides to join her. Let's see what happens next.</p>
            </div>
        </div>
        <div class="text__2">
            <div class="plot">
                <h1>Name</h1>
                <p>The visual novel takes place in Berkeley. The main character, Helen, witnesses strange events unfolding at the Institute of Solar-Terrestrial Physics. She meets Liliana, a resistance member fighting a virus cult. Helen decides to join her. Let's see what happens next.</p>
            </div>
        </div>
        <div class="text__2">
            <div class="plot">
                <h1>Name</h1>
                <p>The visual novel takes place in Berkeley. The main character, Helen, witnesses strange events unfolding at the Institute of Solar-Terrestrial Physics. She meets Liliana, a resistance member fighting a virus cult. Helen decides to join her. Let's see what happens next.</p>
            </div>
        </div>
    </main>
    <footer>
        <p class="text_for_footer">The Virus Cult</p>
    </footer>
</body>
</html>