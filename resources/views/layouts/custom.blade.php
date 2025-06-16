<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechRent</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: url('{{ asset('background1.png') }}') no-repeat center center fixed;
            background-size: cover;
            color: #FAED26;
            margin: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .navbar img {
            height: 40px;
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

        .content {
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .content-box {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 40px;
            border-radius: 12px;
            max-width: 1000px;
            width: 100%;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #444;
            text-align: left;
        }

        .btn {
            background-color: #FAED26;
            color: black;
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
        }

        .btn-danger {
            color: red;
            background: transparent;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
<body>

    <div class="navbar">
        <div>
            <img src="{{ asset('logo.png') }}" alt="TechRent">
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

    <div class="content">
        <div class="content-box">
            @yield('content')
        </div>
    </div>

</body>
</html>
