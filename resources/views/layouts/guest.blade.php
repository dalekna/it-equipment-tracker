<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'TechRent') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                font-family: 'Inter', sans-serif;
                background: url('{{ asset('background1.png') }}') no-repeat center center fixed;
                background-size: cover;
                color: #FAED26;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px 60px;
                background-color: rgba(0, 0, 0, 0.7);
            }

            .navbar img {
                height: 50px;
            }

            .navbar a {
                margin-left: 30px;
                color: #FAED26;
                text-decoration: none;
                font-weight: bold;
                transition: 0.3s;
            }

            .navbar a:hover {
                text-decoration: underline;
            }

            .form-container {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .form-box {
                border-radius: 12px;
                width: 100%;
                max-width: 400px;
                color: white;
            }

            .form-box label {
                color: #e6e6e6;
            }

            .form-box input,
            .form-box select {
                background-color: #2a2a2a;
                border: 1px solid #555;
                color: white;
            }

            .form-box button {
                background-color: #FAED26;
                color: black;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <div>
                <img src="{{ asset('logo.png') }}" alt="TechRent Logo">
            </div>
            <div>
    @auth
        <a href="{{ route('equipment.index') }}" class="nav-link" style="color: yellow; font-weight: bold;">Nuomotojui</a>
        <a href="{{ route('rent.index') }}" class="nav-link" style="color: yellow; font-weight: bold;">Nuomininkui</a>

        <form method="POST" action="{{ route('logout') }}" style="display:inline; margin-left: 10px;">
            @csrf
            <button type="submit" style="background:none; border:none; color: yellow;">Atsijungti</button>
        </form>
    @else
        <a href="{{ route('login') }}">Prisijungti</a>
        <a href="{{ route('register') }}">Registruotis</a>
    @endauth
</div>

        </div>

        <div class="form-container">
            <div class="form-box">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
