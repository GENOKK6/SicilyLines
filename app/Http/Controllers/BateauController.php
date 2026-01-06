<?php

namespace App\Http\Controllers;

use App\Models\Bateau;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage; 

class BateauController extends Controller
{
    public function index() {
        $bateaux = Bateau::all();
        return view('index', compact('bateaux'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $bateau = new Bateau();
        $bateau->nom = $request->nom;
        $bateau->longueur = $request->longueur;
        $bateau->largeur = $request->largeur;
        $bateau->equipements = $request->equipements;
        $bateau->details = $request->details; // Vérifie que c'est 'details' ou 'description' dans ton formulaire

        // --- PARTIE IMAGE ---
        // On vérifie si une image a été envoyée
        if ($request->hasFile('image')) {
            // On enregistre le fichier dans 'storage/app/public/bateaux'
            $path = $request->file('image')->store('bateaux', 'public');
            // On donne le chemin à la colonne 'image_url' de ta BDD
            $bateau->image_url = $path;
        }

        $bateau->save();

        return redirect()->route('bateaux.index');
    }

    public function show($id)
{
    $bateau = Bateau::findOrFail($id);
    // On change 'bateaux.show' par 'show' tout court
    return view('show', ['bateau' => $bateau]); 
}

    public function destroy($id)
    {
        $bateau = Bateau::findOrFail($id);
        
        // Optionnel : Supprimer le fichier image du serveur quand on supprime le bateau
        if ($bateau->image_url) {
            Storage::disk('public')->delete($bateau->image_url);
        }

        $bateau->delete();
        return redirect()->route('bateaux.index');
    }

    public function genererPDF()
{
    // On récupère tous les bateaux comme dans ton exemple de cours
    $bateaux = Bateau::all();

    $data = [
        'titre' => 'Liste de la flotte SicilyLines',
        'date' => date('d/m/Y'),
        'bateaux' => $bateaux
    ];

    // On charge la vue 'pdf.blade.php'
    $pdf = Pdf::loadView('pdf', $data);

    // On télécharge le fichier
    return $pdf->download('liste_bateaux_sicilylines.pdf');
}
}