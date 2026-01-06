<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Bateau - {{ $bateau->nom }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .nav-pills .nav-link { border-radius: 20px; font-weight: bold; margin-left: 10px; }
        
        /* Style pour coller à ton prototype Uizard */
        .boat-detail-img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 25px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .specs-sidebar {
            background-color: #e0f2fe; /* Le bleu ciel du bloc caractéristiques */
            border-radius: 25px;
            padding: 40px;
            height: 100%;
        }
        .spec-label { font-weight: bold; color: #333; display: block; margin-top: 15px; }
        .spec-value { color: #1e3a8a; font-weight: bold; font-size: 1.1rem; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-5 py-3">
        <div class="container">
            <div class="navbar-brand">
                <img src="{{ asset('Image/logo.png') }}" alt="Logo SicilyLines" style="height: 60px; width: auto;">
            </div>
            <div class="collapse navbar-collapse justify-content-end">
                <div class="navbar-nav nav-pills">
                    <a class="nav-link bg-light text-dark" href="{{ route('home') }}">Page d'accueil</a>
                    <a class="nav-link bg-light text-dark" href="{{ route('bateaux.create') }}">Ajout de bateau</a>
                    <a class="nav-link bg-info text-white active" href="{{ route('bateaux.index') }}">Listes Bateaux</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                @if($bateau->image_url)
                    <img src="{{ asset('storage/' . $bateau->image_url) }}" class="boat-detail-img mb-4" alt="{{ $bateau->nom }}">
                @else
                    <img src="{{ asset('Image/bateau3.jpg') }}" class="boat-detail-img mb-4" alt="Image par défaut">
                @endif

                <h2 class="fw-bold mb-3">Détails du Bateau</h2>
                <p class="text-muted fs-5" style="line-height: 1.8;">
                    {{ $bateau->details ?? 'Ce navire moderne est parfaitement équipé pour assurer votre confort durant la traversée.' }}
                </p>
            </div>

            <div class="col-lg-5">
                <div class="specs-sidebar shadow-sm">
                    <h2 class="fw-bold mb-4">Caractéristiques :</h2>
                    
                    <span class="spec-label">Longueur :</span>
                    <span class="spec-value">{{ $bateau->longueur }} mètres</span>

                    <span class="spec-label">Largeur :</span>
                    <span class="spec-value">{{ $bateau->largeur }} mètres</span>

                    <span class="spec-label">Équipement :</span>
                    <span class="spec-value text-dark">{{ $bateau->equipements ?? 'Bar, Restaurant, Wi-Fi' }}</span>

                    <div class="mt-5 d-grid gap-2">
                        <a href="{{ route('bateaux.index') }}" class="btn btn-outline-primary rounded-pill py-2 fw-bold">Retour à la liste</a>
                        <form action="{{ route('bateaux.destroy', $bateau->id) }}" method="POST" onsubmit="return confirm('Supprimer ce navire ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100 rounded-pill py-2 fw-bold">Supprimer le bateau</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>