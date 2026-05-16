<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    @vite(['resources/css/plans.css', 'resources/css/links-style.css'])
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
            <p>Here you can see our plans for the second chapter</p>
        </div>

        <div class="text__2">
            <p>Characters</p>
        </div>

        <div class="custom-slider">
            <div class="slider-container">
                <div class="slider-slides" id="slidesTrack">
                    <div class="slide-item">
                        <div class="slide-image">
                            <img src="" alt="Visual 1">
                        </div>
                        <div class="slide-text">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="slide-image">
                            <img src="" alt="Visual 2">
                        </div>
                        <div class="slide-text">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="slide-image">
                            <img src="" alt="Visual 3">
                        </div>
                        <div class="slide-text">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="slide-image">
                            <img src="" alt="Visual 4">
                        </div>
                        <div class="slide-text">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="slide-image">
                            <img src="" alt="Visual 5">
                        </div>
                        <div class="slide-text">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-buttons">
                <button class="slider-btn" id="prevSlideBtn">◀</button>
                <div class="dots" id="sliderDots"></div>
                <button class="slider-btn" id="nextSlideBtn">▶</button>
            </div>
        </div>

        <div class="text__2">
            <p>Locations</p>
        </div>

        <div class="custom-slider">
            <div class="slider-container">
                <div class="slider-slides" id="slidesTrackThree">
                    <div class="slide-item">
                        <div class="slide-image">
                            <img src="" alt="Key art 1">
                        </div>
                        <div class="slide-text">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="slide-image">
                            <img src="" alt="Key art 2">
                        </div>
                        <div class="slide-text">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="slide-image">
                            <img src="" alt="Key art 3">
                        </div>
                        <div class="slide-text">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-buttons">
                <button class="slider-btn" id="prevSlideBtnThree">◀</button>
                <div class="dots" id="sliderDotsThree"></div>
                <button class="slider-btn" id="nextSlideBtnThree">▶</button>
            </div>
        </div>
    </main>
    <footer>
        <p class="text_for_footer">The Virus Cult</p>
    </footer>

    <script>
        (function() {
            function initSingleSlider(trackId, prevBtnId, nextBtnId, dotsId, autoDelay = 5500) {
                const track = document.getElementById(trackId);
                if (!track) return;
                
                const slides = Array.from(track.querySelectorAll('.slide-item'));
                const totalSlides = slides.length;
                if (totalSlides === 0) return;
                
                let currentIndex = 0;
                let autoInterval = null;
                
                const prevBtn = document.getElementById(prevBtnId);
                const nextBtn = document.getElementById(nextBtnId);
                const dotsContainer = document.getElementById(dotsId);
                
                function updateSlider(instant = false) {
                    if (!track) return;
                    const containerWidth = track.parentElement.clientWidth;
                    const shift = -currentIndex * containerWidth;
                    if (instant) {
                        track.style.transition = 'none';
                        track.style.transform = `translateX(${shift}px)`;
                        void track.offsetHeight;
                        track.style.transition = 'transform 0.5s ease-in-out';
                    } else {
                        track.style.transform = `translateX(${shift}px)`;
                    }
                    updateDotsActive();
                }
                
                function updateDotsActive() {
                    if (!dotsContainer) return;
                    const dots = dotsContainer.querySelectorAll('.dot');
                    dots.forEach((dot, idx) => {
                        if (idx === currentIndex) {
                            dot.classList.add('active');
                        } else {
                            dot.classList.remove('active');
                        }
                    });
                }
                
                function createDots() {
                    if (!dotsContainer) return;
                    dotsContainer.innerHTML = '';
                    for (let i = 0; i < totalSlides; i++) {
                        const dot = document.createElement('div');
                        dot.classList.add('dot');
                        if (i === currentIndex) dot.classList.add('active');
                        dot.addEventListener('click', () => {
                            stopAutoPlay();
                            goToSlide(i);
                            startAutoPlay();
                        });
                        dotsContainer.appendChild(dot);
                    }
                }
                
                function goToSlide(index) {
                    let newIndex = index;
                    if (newIndex < 0) newIndex = totalSlides - 1;
                    if (newIndex >= totalSlides) newIndex = 0;
                    if (newIndex === currentIndex) return;
                    currentIndex = newIndex;
                    updateSlider(false);
                }
                
                function nextSlide() {
                    goToSlide(currentIndex + 1);
                }
                
                function prevSlide() {
                    goToSlide(currentIndex - 1);
                }
                
                function startAutoPlay() {
                    if (autoInterval) clearInterval(autoInterval);
                    autoInterval = setInterval(() => {
                        nextSlide();
                    }, autoDelay);
                }
                
                function stopAutoPlay() {
                    if (autoInterval) {
                        clearInterval(autoInterval);
                        autoInterval = null;
                    }
                }
                
                function init() {
                    createDots();
                    const parent = track.parentElement;
                    const startWidth = parent.clientWidth;
                    track.style.transition = 'none';
                    track.style.transform = `translateX(${-currentIndex * startWidth}px)`;
                    void track.offsetHeight;
                    track.style.transition = 'transform 0.5s ease-in-out';
                    
                    if (prevBtn) {
                        prevBtn.addEventListener('click', (e) => {
                            e.preventDefault();
                            stopAutoPlay();
                            prevSlide();
                            startAutoPlay();
                        });
                    }
                    if (nextBtn) {
                        nextBtn.addEventListener('click', (e) => {
                            e.preventDefault();
                            stopAutoPlay();
                            nextSlide();
                            startAutoPlay();
                        });
                    }
                    
                    let resizeTimer;
                    window.addEventListener('resize', () => {
                        if (resizeTimer) clearTimeout(resizeTimer);
                        resizeTimer = setTimeout(() => {
                            if (!track) return;
                            const newWidth = track.parentElement.clientWidth;
                            track.style.transition = 'none';
                            track.style.transform = `translateX(${-currentIndex * newWidth}px)`;
                            void track.offsetHeight;
                            track.style.transition = 'transform 0.5s ease-in-out';
                        }, 120);
                    });
                    
                    const sliderArea = track.closest('.custom-slider');
                    if (sliderArea) {
                        sliderArea.addEventListener('mouseenter', stopAutoPlay);
                        sliderArea.addEventListener('mouseleave', startAutoPlay);
                    }
                    
                    startAutoPlay();
                }
                
                init();
            }
            
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', () => {
                    initSingleSlider('slidesTrack', 'prevSlideBtn', 'nextSlideBtn', 'sliderDots', 5500);
                    initSingleSlider('slidesTrackThree', 'prevSlideBtnThree', 'nextSlideBtnThree', 'sliderDotsThree', 5500);
                });
            } else {
                initSingleSlider('slidesTrack', 'prevSlideBtn', 'nextSlideBtn', 'sliderDots', 5500);
                initSingleSlider('slidesTrackThree', 'prevSlideBtnThree', 'nextSlideBtnThree', 'sliderDotsThree', 5500);
            }
        })();
    </script>
</body>
</html>