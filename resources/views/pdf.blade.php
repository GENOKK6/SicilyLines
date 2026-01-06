<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des bateaux</title>
    <style>
        body { font-family: sans-serif; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th { border: 1px solid black; padding: 10px; font-weight: bold; background-color: #f3f4f6; }
        td { border: 1px solid black; padding: 8px; text-align: center; }
        h1 { text-align: center; color: #1e3a8a; }
    </style>
</head>
<body>
    <h1>{{ $titre }}</h1>
    <p>Date de génération : {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Longueur</th>
                <th>Largeur</th>
                <th>Équipements</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bateaux as $bateau)
            <tr>
                <td>{{ $bateau->nom }}</td>
                <td>{{ $bateau->longueur }} m</td>
                <td>{{ $bateau->largeur }} m</td>
                <td>{{ $bateau->equipements ?? 'Standard' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>