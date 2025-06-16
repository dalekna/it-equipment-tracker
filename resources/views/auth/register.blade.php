<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registruotis – TechRent</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: url('/background1.png') no-repeat center center fixed;
            background-size: cover;
            color: #FAED26;
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

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            min-height: calc(100vh - 80px); /* be navbar */
        }

        .form-box {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 40px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            color: white;
        }

        .form-box label {
            display: block;
            margin-bottom: 5px;
            color: #e6e6e6;
        }

        .form-box input,
        .form-box select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            background-color: #2a2a2a;
            border: 1px solid #555;
            color: white;
            border-radius: 6px;
        }

        .form-box button {
            background-color: #FAED26;
            color: black;
            font-weight: bold;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .form-box .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-box .logo img {
            height: 40px;
        }

        .form-box .link {
            margin-top: 10px;
            font-size: 0.9rem;
        }

        .form-box .link a {
            color: #FAED26;
            text-decoration: underline;
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
            <div class="logo">
                <img src="{{ asset('logo.png') }}" alt="TechRent">
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label for="vardas">Vardas</label>
                <input id="vardas" type="text" name="vardas" required>

                <label for="pavarde">Pavardė</label>
                <input id="pavarde" type="text" name="pavarde" required>


                <label for="email">El. paštas</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                <label for="password">Slaptažodis</label>
                <input id="password" type="password" name="password" required>

                <label for="password_confirmation">Pakartoti slaptažodį</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>

                <label for="roleid">Pasirinkite vaidmenį</label>
                <select name="roleid" id="roleid" required>
                    <option value="2" selected>Nuomininkas</option>
                    <option value="1">Nuomotojas</option>
                </select>

                <button type="submit">Registruotis</button>
            </form>

            <div class="link">
                Jau turite paskyrą? <a href="{{ route('login') }}">Prisijunkite</a>
            </div>
        </div>
    </div>
</body>
</html>
