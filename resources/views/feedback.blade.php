<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    @vite(['resources/css/feedback.css', 'resources/css/links-style.css'])
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
            <p>You can leave a review</p>
            <p>Share your thoughts about The Virus Cult — your feedback helps us grow.<br>
            Tell us what you loved, what surprised you, and what you'd like to see next.<br>
            Every opinion matters and brings us closer to creating the ultimate visual novel experience.<br>
            Thank you for being part of this dark and unforgettable journey.</p>
        </div>
        <div class="rewiew">
            <!-- Звёздочки для оценки -->
            <div class="rating">
                <input type="radio" name="rating" id="star5" value="5">
                <label for="star5">★</label>
                <input type="radio" name="rating" id="star4" value="4">
                <label for="star4">★</label>
                <input type="radio" name="rating" id="star3" value="3">
                <label for="star3">★</label>
                <input type="radio" name="rating" id="star2" value="2">
                <label for="star2">★</label>
                <input type="radio" name="rating" id="star1" value="1">
                <label for="star1">★</label>
            </div>
            <div class="rating-text">Tap the stars to rate (1-5)</div>
            
            <textarea placeholder="Write your review here..." rows="6" cols="50"></textarea>
            <button>Submit review</button>
        </div>
    </main>
    <footer>
        <p class="text_for_footer">The Virus Cult</p>
    </footer>
</body>
</html>