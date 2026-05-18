<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    @vite(['resources/css/main.css', 'resources/css/links-style.css'])
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
                <p>«THE VIRUS CULT»</p>
                <p>A VISUAL NOVEL IN THE HORROR GENRE</p>
                <p class="prohibite">Age rating 18+ (PROHIBITED FOR CHILDREN)</p>
            </div>
        </div>
        <div class="text__2">
            <div class="plot">
                <p>The visual novel takes place in Berkeley. The main character, Helen, witnesses strange events unfolding at the Institute of Solar-Terrestrial Physics. She meets Liliana, a resistance member fighting a virus cult. Helen decides to join her. Let's see what happens next.</p>
            </div>
            <div>
                <img src="images.jpeg" alt="The Virus Cult">
            </div>
        </div>
        <div class="text__4">
            <form method="GET" action="{{route('our-plans')}}">
                <button>Our plans</button>
            </form>
        </div>
        <div class="text__3">
            <div class="galery">
                <p>Gallery</p>
                <div class="description"><p>Many people have been working as programmers for a long time. They write code, build websites, and design neural networks. But no one thinks about who's really running it all.</p></div>
            </div>
            
            <div class="fullwidth-slider">
                <div class="slider-track" id="sliderTrack">
                    <div class="slide-empty"><img src="images.jpeg" alt="The Virus Cult"></div>
                    <div class="slide-empty"><img src="images.jpeg" alt="The Virus Cult"></div>
                    <div class="slide-empty"><img src="images.jpeg" alt="The Virus Cult"></div>
                    <div class="slide-empty"><img src="images.jpeg" alt="The Virus Cult"></div>
                    <div class="slide-empty"><img src="images.jpeg" alt="The Virus Cult"></div>
                </div>
            </div>
            
            <div class="slider-controls">
                <button class="slider-btn" id="prevBtn">◀</button>
                <div class="dots-container" id="dotsContainer"></div>
                <button class="slider-btn" id="nextBtn">▶</button>
            </div>
        </div>
    </main>
    <footer>
        <p class="text_for_footer">The Virus Cult</p>
    </footer>

    <script>
        (function() {
            const track = document.getElementById('sliderTrack');
            const slides = document.querySelectorAll('.slide-empty');
            const totalSlides = slides.length;  // = 5
            
            if (!track || totalSlides === 0) return;
            
            let currentIndex = 0;
            let autoInterval = null;
            const AUTO_DELAY = 5000;
            
            const prevButton = document.getElementById('prevBtn');
            const nextButton = document.getElementById('nextBtn');
            const dotsContainer = document.getElementById('dotsContainer');
            
            // обновление позиции слайдера (полная ширина)
            function updateSlider(instant = false) {
                const container = track.parentElement;
                const slideWidth = container.clientWidth;
                const shift = -currentIndex * slideWidth;
                if (instant) {
                    track.style.transition = 'none';
                    track.style.transform = `translateX(${shift}px)`;
                    // принудительный reflow
                    void track.offsetHeight;
                    track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                } else {
                    track.style.transform = `translateX(${shift}px)`;
                }
                updateDots();
            }
            
            // обновить активные точки
            function updateDots() {
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
            
            // создать точки навигации
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
                }, AUTO_DELAY);
            }
            
            function stopAutoPlay() {
                if (autoInterval) {
                    clearInterval(autoInterval);
                    autoInterval = null;
                }
            }
            
            function initSlider() {
                createDots();
                const container = track.parentElement;
                const initialWidth = container.clientWidth;
                track.style.transition = 'none';
                track.style.transform = `translateX(${-currentIndex * initialWidth}px)`;
                void track.offsetHeight;
                track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                
                if (prevButton) {
                    prevButton.addEventListener('click', (e) => {
                        e.preventDefault();
                        stopAutoPlay();
                        prevSlide();
                        startAutoPlay();
                    });
                }
                if (nextButton) {
                    nextButton.addEventListener('click', (e) => {
                        e.preventDefault();
                        stopAutoPlay();
                        nextSlide();
                        startAutoPlay();
                    });
                }
                
                let resizeTimeout;
                window.addEventListener('resize', () => {
                    if (resizeTimeout) clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                        if (!track) return;
                        const newWidth = track.parentElement.clientWidth;
                        track.style.transition = 'none';
                        track.style.transform = `translateX(${-currentIndex * newWidth}px)`;
                        void track.offsetHeight;
                        track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                    }, 100);
                });
                
                startAutoPlay();
                
                const sliderArea = document.querySelector('.fullwidth-slider');
                if (sliderArea) {
                    sliderArea.addEventListener('mouseenter', stopAutoPlay);
                    sliderArea.addEventListener('mouseleave', startAutoPlay);
                }
                const controlsArea = document.querySelector('.slider-controls');
                if (controlsArea) {
                    controlsArea.addEventListener('mouseenter', stopAutoPlay);
                    controlsArea.addEventListener('mouseleave', startAutoPlay);
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