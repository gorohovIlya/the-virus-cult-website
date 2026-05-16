<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: black;
            margin: 0;
            padding: 0;
        }
        header {
            background: #1a1a2e;
            height: 100px;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
        }
        footer {
            background: #1a1a2e;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
        }
        h1 {
            margin: 0 70px 0 0;
            color: white;
            font-size: 18px;
        }
        header div {
            margin: 0;
            padding: 0;
        }
        .img {
            padding-right: 80px;
            padding-left: 20px;
        }
        .img h1 {
            font-size: 28px;
            font-weight: bold;
        }
        .text_for_footer {
            color: white;
            font-size: 50px;
            margin: 0;
        }
        .link-hover {
            text-decoration: none;
            position: relative;
            display: inline-block;
            width: auto;
        }
        .link-hover::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0px;
            left: 0;
            background-color: purple;
            visibility: hidden;
            transform: scaleX(0);
            transition: all 0.3s ease-in-out;
        }
        .link-hover:hover::after {
            visibility: visible;
            transform: scaleX(1);
        }
        div:not(.img) > h1 {
            cursor: pointer;
        }
        div:not(.img) > h1:hover {
            color: purple;
        }
        main {
            margin: 0;
            padding: 0;
        }
        .text__1 p{
            color: white;
            font-size: 40px;
            text-align: center;
        }

        .text__2 p{
            color: white;
            font-size: 30px;
            text-align: center;
        }

        .custom-slider {
            width: 100%;
            max-width: 1200px;
            margin: 60px auto;
            background: #0a0a12;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.6);
        }

        .slider-container {
            position: relative;
            width: 100%;
            background: #030308;
        }

        .slider-slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide-item {
            flex: 0 0 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
            padding: 40px 60px;
            background: linear-gradient(135deg, #0b0b18 0%, #05050c 100%);
            box-sizing: border-box;
            min-height: 460px;
        }

        .slide-image {
            flex: 1;
            text-align: center;
        }

        .slide-image img {
            width: 100%;
            max-width: 380px;
            height: auto;
            border-radius: 24px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.6);
            border: 2px solid rgba(128, 0, 128, 0.4);
            object-fit: cover;
        }

        .slide-text {
            flex: 1;
            color: white;
            font-family: Arial, sans-serif;
        }

        .slide-text h3 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #c084fc;
            letter-spacing: 1px;
        }

        .slide-text p {
            font-size: 22px;
            line-height: 1.5;
            margin: 0;
        }

        .slider-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            padding: 20px 0 30px 0;
            background: #0a0a12;
        }

        .slider-btn {
            background: #1e1a2f;
            border: none;
            width: 54px;
            height: 54px;
            border-radius: 60px;
            color: white;
            font-size: 30px;
            cursor: pointer;
            transition: 0.2s;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .slider-btn:hover {
            background: #8b48d4;
            transform: scale(1.08);
        }

        .dots {
            display: flex;
            gap: 18px;
            justify-content: center;
        }

        .dot {
            width: 12px;
            height: 12px;
            background-color: #45296b;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.2s;
        }

        .dot.active {
            background-color: #c084fc;
            width: 30px;
            border-radius: 12px;
        }

        @media (max-width: 800px) {
            .slide-item {
                flex-direction: column;
                padding: 30px 25px;
                text-align: center;
            }
            .slide-text p {
                font-size: 18px;
            }
            .slide-text h3 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="img"><h1>The Virus Cult</h1></div>
        <div><h1 class="link-hover">Home</h1></div>
        <div><h1 class="link-hover">Download</h1></div>
        <div><h1 class="link-hover">Feedback</h1></div>
        <div><h1 class="link-hover">Support us</h1></div>
        <div><h1 class="link-hover">About us</h1></div>
        <div><h1 class="link-hover">Log In</h1></div>
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