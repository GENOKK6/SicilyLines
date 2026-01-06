<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Bateaux - SicilyLines</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .btn-custom-cyan { background-color: #67c3ef; color: white; border: none; }
        .btn-custom-cyan:hover { background-color: #4baad6; color: white; }
        .nav-pills .nav-link { border-radius: 20px; margin-left: 10px; font-weight: bold; }
        
        /* Style pour des cartes élégantes conformes à ton visuel */
        .boat-card {
            background: white;
            border-radius: 20px;
            border: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            padding: 15px;
            transition: 0.3s;
        }
        
        .boat-img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 15px !important;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-5 py-3">
        <div class="container">
            <div class="navbar-brand">
                <img src="{{ asset('Image/logo.png') }}" alt="Logo SicilyLines" style="height: 60px; width: auto;">
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="navbar-nav nav-pills align-items-center">
                    <a class="nav-link bg-light text-dark" href="{{ route('home') }}">Page d'accueil</a>
                    <a class="nav-link bg-info text-white" href="{{ route('bateaux.create') }}">Ajout de bateau</a>
                    <a class="nav-link bg-light text-dark active" href="{{ route('bateaux.index') }}">Listes Bateaux</a>
                    
                    <a class="nav-link bg-light text-dark" href="{{ route('bateaux.pdf') }}">Générer le PDF</a>
                    
                    

                    @auth
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger ms-3" style="border-radius: 20px; font-weight: bold;">
                            Déconnexion
                        </button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            
            @forelse($bateaux as $bateau)
            <div class="col"> 
                <div class="boat-card h-100">
                    
                    @if($bateau->image_url)
                        <img src="{{ asset('storage/' . $bateau->image_url) }}" class="boat-img" alt="{{ $bateau->nom }}">
                    @else
                        <img src="{{ asset('Image/bateau3.jpg') }}" class="boat-img" alt="Bateau par défaut">
                    @endif
                    
                    <div class="card-body px-0">
                        <h5 class="fw-bold text-dark">{{ $bateau->nom }}</h5>
                        <p class="text-muted small mb-3">
                            {{ Str::limit($bateau->details, 60) }}
                        </p>

                        <div class="d-grid gap-2">
                            <a href="{{ route('bateaux.show', $bateau->id) }}" class="btn btn-custom-cyan btn-sm rounded-pill py-2">
                                Voir plus en détails
                            </a>

                            <form action="{{ route('bateaux.destroy', $bateau->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce navire ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm w-100 rounded-pill py-2" style="background-color: #ff5252; border: none;">
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