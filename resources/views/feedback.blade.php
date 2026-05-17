<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel - Reviews</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <!-- Блок с текстом -->
        <div class="text__1">
            <p>You can leave a review</p>
            <p>Share your thoughts about The Virus Cult — your feedback helps us grow.<br>
            Tell us what you loved, what surprised you, and what you'd like to see next.<br>
            Every opinion matters and brings us closer to creating the ultimate visual novel experience.<br>
            Thank you for being part of this dark and unforgettable journey.</p>
        </div>

        <!-- Блок с формой отзыва -->
        <div class="review-form-container">
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert-errors">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(isset($userReview) && $userReview)
                <!-- Уже оставленный отзыв -->
                <div class="existing-review">
                    <h2>Thank you for your feedback!</h2>
                    <div class="existing-rating">{{ str_repeat('⭐', $userReview->rating) }}</div>
                    <p class="existing-comment">{{ $userReview->comment ?? 'No comment' }}</p>
                </div>
            @elseif(!Auth::check())
                <div class="login-prompt">
                    <p>Please log in to leave a review</p>
                    <a href="{{ route('login') }}" class="login-btn">Log in</a>
                </div>
            @else
                <form action="{{ route('feedback.store') }}" method="POST" class="review-form">
                    @csrf
                    
                    <div class="rating">
                        <input type="radio" name="rating" id="star5" value="5" {{ old('rating') == 5 ? 'checked' : '' }} required>
                        <label for="star5">★</label>
                        <input type="radio" name="rating" id="star4" value="4" {{ old('rating') == 4 ? 'checked' : '' }}>
                        <label for="star4">★</label>
                        <input type="radio" name="rating" id="star3" value="3" {{ old('rating') == 3 ? 'checked' : '' }}>
                        <label for="star3">★</label>
                        <input type="radio" name="rating" id="star2" value="2" {{ old('rating') == 2 ? 'checked' : '' }}>
                        <label for="star2">★</label>
                        <input type="radio" name="rating" id="star1" value="1" {{ old('rating') == 1 ? 'checked' : '' }}>
                        <label for="star1">★</label>
                    </div>
                    <div class="rating-text">Tap the stars to rate (1-5)</div>
                    
                    <textarea 
                        name="comment" 
                        placeholder="Write your review here..." 
                        rows="6" 
                        cols="50"
                    >{{ old('comment') }}</textarea>
                    <div class="button-container">
                        <button type="submit">Submit review</button>
                    </div>
                </form>
            @endif
        </div>

        <!-- Слайдер с отзывами -->
        @if($reviews->count() > 0)
            <div class="reviews-slider-section">
                <h2 class="reviews-title">Reviews</h2>
                
                <div class="reviews-slider-container">
                    <button class="slider-arrow prev-arrow" id="prevReview">◀</button>
                    
                    <div class="reviews-slider" id="reviewsSlider">
                        <div class="slider-track" id="sliderTrack">
                            @foreach($reviews as $review)
                                <div class="review-card">
                                    <div class="review-header">
                                        <span class="reviewer-name">{{ $review->user->name }}</span>
                                        <span class="review-rating">{{ str_repeat('⭐', $review->rating) }}</span>
                                    </div>
                                    <p class="review-comment">{{ $review->comment ?? 'No comment' }}</p>
                                    <div class="review-date">{{ $review->created_at->diffForHumans() }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <button class="slider-arrow next-arrow" id="nextReview">▶</button>
                </div>
                
                <div class="slider-dots" id="sliderDots"></div>
            </div>
        @else
            <div class="no-reviews">
                <p>No reviews yet. Be the first!</p>
            </div>
        @endif
    </main>

    <footer>
        <p class="text_for_footer">The Virus Cult</p>
    </footer>

    <script>
        (function() {
            const track = document.getElementById('sliderTrack');
            if (!track) return;
            
            const slides = document.querySelectorAll('.review-card');
            const totalSlides = slides.length;
            const slidesPerView = 3; // Фиксированное количество карточек
            let currentIndex = 0;
            
            const prevBtn = document.getElementById('prevReview');
            const nextBtn = document.getElementById('nextReview');
            const dotsContainer = document.getElementById('sliderDots');
            
            function updateSlider(instant = false) {
                const slideWidth = 330; // 300px карточка + 30px gap
                const shift = -currentIndex * slideWidth;
                
                if (instant) {
                    track.style.transition = 'none';
                    track.style.transform = `translateX(${shift}px)`;
                    void track.offsetHeight;
                    track.style.transition = 'transform 0.5s ease-in-out';
                } else {
                    track.style.transform = `translateX(${shift}px)`;
                }
                updateDots();
            }
            
            function updateDots() {
                if (!dotsContainer) return;
                const totalPages = Math.ceil(totalSlides / slidesPerView);
                const currentPage = Math.floor(currentIndex / slidesPerView);
                
                const dots = dotsContainer.querySelectorAll('.dot');
                dots.forEach((dot, idx) => {
                    if (idx === currentPage) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }
            
            function createDots() {
                if (!dotsContainer) return;
                const totalPages = Math.ceil(totalSlides / slidesPerView);
                dotsContainer.innerHTML = '';
                
                for (let i = 0; i < totalPages; i++) {
                    const dot = document.createElement('div');
                    dot.classList.add('dot');
                    if (i === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => {
                        goToPage(i);
                    });
                    dotsContainer.appendChild(dot);
                }
            }
            
            function goToPage(page) {
                const maxPage = Math.ceil(totalSlides / slidesPerView) - 1;
                let newPage = Math.max(0, Math.min(page, maxPage));
                currentIndex = newPage * slidesPerView;
                updateSlider(false);
            }
            
            function nextSlide() {
                const maxIndex = totalSlides - slidesPerView;
                if (currentIndex + slidesPerView >= totalSlides) {
                    currentIndex = 0;
                } else {
                    currentIndex += slidesPerView;
                }
                updateSlider(false);
            }
            
            function prevSlide() {
                if (currentIndex - slidesPerView < 0) {
                    currentIndex = totalSlides - slidesPerView;
                    if (currentIndex < 0) currentIndex = 0;
                } else {
                    currentIndex -= slidesPerView;
                }
                updateSlider(false);
            }
            
            function initSlider() {
                createDots();
                updateSlider(true);
                
                if (prevBtn) {
                    prevBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        prevSlide();
                    });
                }
                
                if (nextBtn) {
                    nextBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        nextSlide();
                    });
                }
            }
            
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initSlider);
            } else {
                initSlider();
            }
        })();
    </script>
</body>
</html>