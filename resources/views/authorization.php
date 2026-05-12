<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Virus Cult - Visual Novel</title>
    <style>        
    body{
        background: black;
        margin: 0;
        padding: 0;
    }

    form{
        display: flex;
        justify-content: center;
        flex-direction: column;
        width: 320px; 
        margin-left: auto;
        margin-right: auto;
        gap: 12px;
        padding: 20px;
    }

    h1{
        color: white;
        text-align: center;
        font-size: 48px;
    }

    label{
        color: white;
    }

    form > div {
        display: flex;
        flex-direction: column;
        gap: 4px;
        width: 100%;
    }

    input, button {
        padding: 6px 8px;
        font-size: 1rem;
        color: white;
        background-color: #1a1a2e;
        border: #2b044b solid 3px;
        border-radius: 50px;
        width: 100%;
        box-sizing: border-box;
    }

    button{
        transition: all 0.3s ease;
        cursor: pointer;
        margin-top: 20px;
    } 

    button:hover {
        background: linear-gradient(135deg, #4a2d77, #2a1a4a);
        border-color: #b77cff;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(128, 0, 128, 0.4);
    }
        
    button:active {
        transform: translateY(1px);
    }
    </style>
</head>
<body>
    <h1>Authorization</h1>
    <form action="">
        <div>
            <label>Nickname or EMAIL:</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>
        <div>
            <button type="submit">Log in</button>
        </div>
    </form>
</body>
</html>