<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechRent</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: url('{{ asset('welcomebackground.png') }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            color: #FAED26;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background: rgba(0, 0, 0, 0.6);
        }

        .navbar-left img {
            height: 60px;
        }

        .navbar-right a {
            margin-left: 30px;
            color: #FAED26;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: 0.3s;
        }

        .navbar-right a:hover {
            text-decoration: underline;
        }

        .middle {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 60px;
        }

        .hero-text {
            max-width: 500px;
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 500px;
            margin-left: 50px;
        }

        .hero-text h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: #FAED26;
        }

        .hero-text p {
            font-size: 1rem;
            line-height: 1.6;
            color: #fefae0;
        }

        .placeholder {
            width: 350px;
            height: 100px;
            /* Tuščia erdvė ateities grafikai, kreivėms ar pan. */
        }
    </style>
</head>
<body>

    <div class="navbar">
    <div class="navbar-left">
        <img src="{{ asset('logo.png') }}" alt="TechRent Logo">
    </div>

    <div class="navbar-right">
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
    </div> <!-- ČIA TRŪKO ŠITOS DIV PABAIGOS -->
</div>
    <div class="middle">
        <div class="hero-text">
            <h1>TechRent</h1>
            <p>
                Patikima IT įrangos nuomos sistema skirta tiek smulkiems verslams, tiek privatiems vartotojams.
                Sekite įrangą, valdykite nuomą, stebėkite istoriją – viskas vienoje vietoje.
            </p>
        </div>

        <div class="placeholder">
            {{-- Tuščia vieta grafikui ar kitai vizualizacijai --}}
        </div>
    </div>

</body>
</html>
