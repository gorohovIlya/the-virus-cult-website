<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    <style>
        body {
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
            font-family: Arial, sans-serif;
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
            cursor: pointer;
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
        .plot h1{
            font-size: 35px;
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
        .text__2:last-of-type {
            margin-bottom: 100px;
        }
        .text__3 {
            margin-top: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 400px;
            padding: 0 80px;
            gap: 50px;
        }
        .text__3:last-of-type {
            margin-bottom: 100px;
        }
        .plot {
            color: white;
            width: 45%;
            font-size: 25px;
            line-height: 1.5;
            font-family: Arial, sans-serif;
            text-align: left;
        }
        .plot p {
            margin: 0;
        }
        .text__3 > div {
            width: 45%;
        }
        .text__3 > div:last-child {
            text-align: right;
        }
        .text__2 img,
        .text__3 img {
            width: 400px;
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(128, 0, 128, 0.5);
        }
        .text__2 > div:has(img),
        .text__3 > div:has(img) {
            width: 400px;
            flex-shrink: 0;
        }

        .text__3 h1{
            margin-right: 10px;
        }
        header div:not(.img) > h1:hover {
            color: purple;
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
        <div><h1 class="link-hover">Languages</h1></div>
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
            <div>
                <img src="images.jpeg" alt="The Virus Cult">
            </div>
        </div>
        <div class="text__3">
            <div>
                <img src="images.jpeg" alt="The Virus Cult">
            </div>
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
            <div>
                <img src="images.jpeg" alt="The Virus Cult">
            </div>
        </div>
        <div class="text__3">
            <div>
                <img src="images.jpeg" alt="The Virus Cult">
            </div>
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