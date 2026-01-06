<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Bateau - SicilyLines</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        
        .btn-cyan {
            background-color: #4dd0e1; color: white; border: none; font-weight: bold;
        }
        .btn-cyan:hover { background-color: #26c6da; color: white; }
        
        .form-card {
            background: white; padding: 30px; border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        
        .nav-pills .nav-link { border-radius: 20px; font-weight: bold; margin-left: 10px;}
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
                    <a class="nav-link bg-info text-white active" href="{{ route('bateaux.create') }}">Ajout de bateau</a>
                    <a class="nav-link bg-light text-dark" href="{{ route('bateaux.index') }}">Listes Bateaux</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-card">
                    <h2 class="mb-4 text-center text-secondary">Ajouter un nouveau navire</h2>

                    <form action="{{ route('bateaux.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nom du bateau</label>
                            <input type="text" name="nom" class="form-control" placeholder="Ex: Le Concordia" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Longueur (m)</label>
                                <input type="number" step="0.01" name="longueur" class="form-control" placeholder="Ex: 150.5" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Largeur (m)</label>
                                <input type="number" step="0.01" name="largeur" class="form-control" placeholder="Ex: 25.0" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Photo du bateau</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Équipements</label>
                            <textarea name="equipements" class="form-control" rows="2" placeholder="Ex: Wifi, Piscine, Restaurant..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Description détaillée</label>
                            <textarea name="details" class="form-control" rows="4" placeholder="Décrivez le bateau..."></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('bateaux.index') }}" class="btn btn-secondary rounded-pill px-4">Annuler</a>
                            <button type="submit" class="btn btn-cyan rounded-pill px-5">Enregistrer le bateau</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>