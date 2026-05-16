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
        .name {
            color: white;
            font-size: 38px;
            margin: 0;
            padding: 0;
            text-align: center;
            width: 100%;
        }
        .name p {
            margin: 0;
            padding: 0;
            line-height: 1.2;
        }
        .prohibite {
            margin-top: 50px !important;
            font-size: 16px;
        }
        .text__1 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 200px;
            padding: 0 50px;
        }
        .text__2 {
            margin-top: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 400px;
            padding: 0 80px;
            gap: 50px;
        }
        .plot {
            color: white;
            width: 45%;
            font-size: 25px;
            line-height: 1.5;
            text-align: left;
        }
        .plot p {
            margin: 0;
        }
        .text__2 div:last-child {
            width: 40%;
            text-align: right;
        }
        .text__2 img {
            width: 100%;
            max-width: 400px;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(128, 0, 128, 0.5);
        }
        .text__3 {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: auto;
            padding: 0;
            margin-top: 80px;
            width: 100%;
        }
        .galery {
            color: white;
            font-size: 38px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 100%;
            margin-bottom: 40px;
        }
        .description {
            font-size: 20px;
            width: 40%;
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

        .fullwidth-slider {
            width: 100%;
            position: relative;
            overflow: hidden;
            background: #0a0a12;
            margin: 0;
            padding: 0;
        }

        .slider-track {
            display: flex;
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            width: 100%;
        }

        .slide-empty {
            flex: 0 0 100%;
            min-height: 450px;
            background: linear-gradient(145deg, #0c0c18, #030308);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 0 40px rgba(0,0,0,0.6);
            border-right: 1px solid rgba(128, 0, 128, 0.15);
            border-left: 1px solid rgba(128, 0, 128, 0.15);
        }

        .slide-empty:nth-child(odd) {
            background: radial-gradient(circle at 30% 20%, #0f0f1c, #020208);
        }
        .slide-empty:nth-child(even) {
            background: radial-gradient(circle at 70% 80%, #0b0b16, #010105);
        }

        .slider-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin-top: 25px;
            margin-bottom: 35px;
            background: transparent;
            padding: 12px 20px;
        }

        .slider-btn {
            background: #221c36;
            border: none;
            width: 52px;
            height: 52px;
            border-radius: 60px;
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.5);
        }

        .slider-btn:hover {
            background: #8b48d4;
            transform: scale(1.07);
        }

        .dots-container {
            display: flex;
            gap: 16px;
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
            width: 28px;
            border-radius: 10px;
            box-shadow: 0 0 6px #b77cff;
        }
        
        main {
            margin: 0;
            padding: 0;
        }
        
        .galery p:first-child {
            margin-bottom: 10px;
        }

        .text__4 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 80px 20px 40px 20px;
            gap: 30px;
        }

        .text__4 p {
            color: white;
            font-size: 48px;
            margin: 0;
            font-family: Arial, sans-serif;
            letter-spacing: 1px;
        }

        .text__4 button {
            width: 280px;
            height: 65px;
            font-size: 22px;
            border: #2b044b solid 3px;
            background-color: #1a1a2e;
            border-radius: 50px;
            cursor: pointer;
            color: white;
            padding: 0;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .text__4 button:hover {
            background: linear-gradient(135deg, #4a2d77, #2a1a4a);
            border-color: #b77cff;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(128, 0, 128, 0.4);
        }

        .text__4 button:active {
            transform: translateY(1px);
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
            <button>Our plans</button>
        </div>
        <div class="text__3">
            <div class="galery">
                <p>Galery</p>
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