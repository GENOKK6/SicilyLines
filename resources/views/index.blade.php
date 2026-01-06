<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Bateaux - SicilyLines</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Petit ajustement pour avoir le bleu ciel spécifique de ta maquette */
        .btn-custom-cyan {
            background-color: #67c3ef;
            color: white;
            border: none;
        }
        .btn-custom-cyan:hover {
            background-color: #4baad6;
            color: white;
        }
        /* Pour les coins arrondis des boutons du menu */
        .nav-pills .nav-link {
            border-radius: 20px;
            margin-left: 10px;
            font-weight: bold;
        }
        .navbar-brand img {
            height: 40px; /* Taille du logo */
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-5 py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold text-primary" href="#">
                <span style="font-size: 1.5rem;">⚓ SicilyLines</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="navbar-nav nav-pills">
                    <a class="nav-link bg-light text-dark" href="{{ route('home') }}">Page d'accueil</a>
                    <a class="nav-link bg-info text-white" href="{{ route('bateaux.create') }}">Ajout de bateau</a>
                    <a class="nav-link bg-light text-dark" href="{{ route('test.pdf') }}">Générer le PDF</a>
                    <a class="nav-link bg-light text-dark active" href="{{ route('bateaux.index') }}">Listes Bateaux</a>
                    
                    @auth
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger ms-3" style="border-radius: 20px;">Déconnexion</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            
            @forelse($bateaux as $bateau)
            <div class="col-md-6 mb-4"> <div class="card h-100 shadow-sm border-0" style="border-radius: 15px; background-color: #eaf6fc;">
                    
                    <img src="https://via.placeholder.com/500x300" class="card-img-top p-3" alt="Bateau" style="border-radius: 25px;">
                    
                    <div class="card-body">
                        <h4 class="card-title fw-bold text-dark">{{ $bateau->nom }}</h4>
                        
                        <p class="card-text text-muted">
                            {{ Str::limit($bateau->details, 80) }}
                        </p>

                        <div class="d-grid gap-2 mt-4">
                            <a href="{{ route('bateaux.show', $bateau->id) }}" class="btn btn-custom-cyan py-2 rounded-pill">
                                Voir plus en détails
                            </a>

                            <form action="{{ route('bateaux.destroy', $bateau->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100 py-2 rounded-pill">
                                    Supprimer
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            @empty
                <div class="col-12 text-center mt-5">
                    <p class="text-muted">Aucun bateau n'est disponible.</p>
                </div>
            @endforelse

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>