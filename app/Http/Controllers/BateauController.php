<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Bateau;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class BateauController extends Controller
{
    public function index()
    {
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

    public function creerPDF()
    {
        // On récupère tous les bateaux de la base de données
        $bateaux = Bateau::all();

        $data = [
            'titre' => 'Liste des Bateaux SicilyLines',
            'date'  => date('d/m/Y'),
            'bateaux' => $bateaux
        ];


        $pdf = PDF::loadView('pdf', $data);


        return $pdf->download('liste_bateaux.pdf');
    }
}
