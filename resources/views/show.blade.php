<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Bateau - {{ $bateau->nom }}</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f3f4f6; }
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .top-menu { margin-bottom: 20px; }
        .content-grid { display: flex; gap: 30px; }
        .image-box { flex: 1; } /* Prend 50% de la place */
        .info-box { flex: 1; }  /* Prend 50% de la place */
        
        img { width: 100%; border-radius: 8px; }
        
        .label { font-weight: bold; color: #555; }
        .data { color: #1e3a8a; font-weight: bold; font-size: 1.1em; }
        
        .btn-delete { background-color: #ef4444; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; }
        .btn-delete:hover { background-color: #dc2626; }
    </style>
</head>
<body>

    <div class="container">
        <div class="top-menu">
            <a href="{{ route('bateaux.index') }}">← Retour à la liste</a>
        </div>

        <h1>{{ $bateau->nom }}</h1>
        <hr>

        <div class="content-grid">
            <div class="image-box">
                <img src="https://via.placeholder.com/600x400" alt="Photo du bateau">
                
                <h3 style="margin-top: 20px;">Détails du Bateau</h3>
                <p>{{ $bateau->details }}</p>
            </div>

            <div class="info-box" style="background-color: #e0f2fe; padding: 20px; border-radius: 8px;">
                <h2>Caractéristiques :</h2>
                
                <p>
                    <span class="label">Longueur :</span> <br>
                    <span class="data">{{ $bateau->longueur }} mètres</span>
                </p>

                <p>
                    <span class="label">Largeur :</span> <br>
                    <span class="data">{{ $bateau->largeur }} mètres</span>
                </p>

                <p>
                    <span class="label">Équipements :</span> <br>
                    <span>{{ $bateau->equipements }}</span>
                </p>

                <br><hr><br>

                <div style="display: flex; gap: 10px;">
                    
                    <a href="#" style="background-color: #fbbf24; padding: 10px 20px; text-decoration: none; color: black; border-radius: 5px;">
                        Modifier
                    </a>

                    <form action="{{ route('bateaux.destroy', $bateau->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bateau ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Supprimer</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>
</html>