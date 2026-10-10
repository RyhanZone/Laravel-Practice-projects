<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f9f9f9;
            color: #333;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            height: 10vh;
        }

        .header h1 {
            font-size: 24px;
            letter-spacing: 1px;
        }

        .header ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .header ul li {
            cursor: pointer;
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .header ul li:hover {
            color: #3498db;
        }

        .main {
            flex: 1; 
            margin: 0 auto;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 82vh;
        }
        .main > h1{
            font-size: 50px;
            font-family: sans-serif;
            font-weight: 600;

        }

        .footer {
            background-color: #1a252f;
            color: #bdc3c7;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            border-top: 1px solid #2c3e50;
            height: 8vh;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Project Name</h1>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <p>2026 Copyright by <a href="http://www.rafirafi.com" target="_blank">Rafi</a></p>
    </footer>

</body>
</html>