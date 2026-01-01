<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Bateaux</title>
    <style>
        .bateau-carte {
            border: 1px solid black; /* Une bordure noire */
            padding: 15px;           /* De l'espace à l'intérieur */
            margin: 10px;            /* De l'espace entre les boîtes */
            display: inline-block;   /* Pour les mettre côte à côte */
            width: 300px;            /* Largeur fixe */
            vertical-align: top;
        }
    </style>
</head>
<body>

    <nav>
        <h1>SicilyLines</h1>
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('bateaux.index') }}">Liste des Bateaux</a></li>
        </ul>
    </nav>

    <hr> <h2>Tous nos navires</h2>

    @if($bateaux->isEmpty())
        <p>Il n'y a pas encore de bateaux enregistrés.</p>
    @else
        @foreach($bateaux as $bateau)
            <div class="bateau-carte">
                <img src="https://via.placeholder.com/280x150" alt="Image du bateau">
                
                <h3>{{ $bateau->nom }}</h3>
                
                <p>{{ Str::limit($bateau->details, 50) }}</p>

                <a href="{{ route('bateaux.show', $bateau->id) }}">
                    Voir plus en détails
                </a>
            </div>
        @endforeach
    @endif

</body>
</html>