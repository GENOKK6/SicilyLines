<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SicilyLines - Accueil</title>
    <style>
        /* CSS simple pour la mise en page */
        body { margin: 0; font-family: sans-serif; }
        
        nav {
            display: flex;               /* Active le mode flexible */
            justify-content: space-between; /* Pousse les éléments aux extrémités (Gauche <-> Droite) */
            align-items: center;         /* Centre verticalement */
            padding: 15px 30px;
            background-color: #f3f4f6;   /* Gris très clair */
            border-bottom: 1px solid #ddd;
        }

        .menu-gauche a {
            margin-right: 20px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .logo {
            font-size: 1.5em;
            font-weight: bold;
            color: #1e3a8a; /* Bleu foncé */
            margin-right: 30px;
            text-decoration: none;
        }

        /* Le style du bouton connexion à droite */
        .btn-connexion {
            background-color: #2563eb; /* Bleu */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-connexion:hover { background-color: #1e40af; }
    </style>
</head>
<body>

    <nav>
        <div class="menu-gauche">
            <a href="{{ route('home') }}" class="logo">SicilyLines</a>
        </div>

        <div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-connexion">Mon Compte</a>
                @else
                    <a href="{{ route('login') }}" class="btn-connexion">Connexion</a>
                @endauth
            @endif
        </div>
    </nav>

  

</body>
</html>