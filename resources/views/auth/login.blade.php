<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - SicilyLines</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        
        .btn-cyan {
            background-color: #4dd0e1;
            color: white;
            border: none;
            font-weight: bold;
            padding: 10px 0;
            transition: background-color 0.3s;
        }
        .btn-cyan:hover {
            background-color: #26c6da;
            color: white;
        }

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            background-color: white;
        }

        .form-control {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 10px 15px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #4dd0e1;
        }

        .bottom-links a {
            font-size: 0.85rem;
            text-decoration: none;
            color: #4dd0e1;
        }
        .bottom-links a:hover {
            text-decoration: underline;
        }
        
        .navbar-brand {
            font-weight: bold;
            color: #1e3a8a;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-light bg-white px-4 py-3 w-100 shadow-sm">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <span style="font-size: 1.2rem;">SicilyLines</span>
            </a>
            <span class="fw-bold text-dark">Compte</span>
        </div>
    </nav>

    <div class="flex-grow-1 d-flex justify-content-center align-items-center py-5">
        
        <div class="login-card">
            <h3 class="text-center mb-4 fw-normal">Connexion</h3>

            @if ($errors->any())
                <div class="alert alert-danger text-center p-2 mb-3" style="font-size: 0.9rem;">
                   Identifiants incorrects.
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold text-secondary">Adresse mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email" required autofocus>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label small fw-bold text-secondary">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>

                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-cyan rounded-pill">
                        Connexion
                    </button>
                </div>

                <div class="d-flex justify-content-between bottom-links">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    @endif
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Créer un compte</a>
                    @endif
                </div>
            </form>
        </div>

    </div>

</body>
</html>