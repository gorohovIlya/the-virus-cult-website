<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        body {
            background: black;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        header {
            background: #1a1a2e;
            height: 100px;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
            flex-shrink: 0;
        }
        
        footer {
            background: #1a1a2e;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
            flex-shrink: 0;
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
            flex: 1;
        }
        
        .description{
            color: white;
            font-size: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin: 60px 20px 40px 20px;
            font-family: Arial, sans-serif;
        }
        
        .download {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 40px;
            margin: 40px 20px 80px 20px;
        }

        .download button {
            width: 320px;
            height: 70px;
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
        }
        
        .download button:hover {
            background: linear-gradient(135deg, #4a2d77, #2a1a4a);
            border-color: #b77cff;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(128, 0, 128, 0.4);
        }
        
        .download button:active {
            transform: translateY(1px);
        }
        
        button[type="windows"]::before {
            content: "🪟 ";
            font-size: 20px;
        }
        button[type="linux"]::before {
            content: "🐧 ";
            font-size: 20px;
        }
        button[type="mac"]::before {
            content: "🍏 ";
            font-size: 20px;
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
        <div class="description">
            <p>You can choose different formats for downloading the visual novel</p>
        </div>
        <div class="download">
            <button type="windows">Скачать на Windows</button>
            <button type="linux">Скачать на Linux</button>
            <button type="mac">Скачать на Mac</button>
        </div>
    </main>
    <footer>
        <p class="text_for_footer">The Virus Cult</p>
    </footer>
</body>
</html>