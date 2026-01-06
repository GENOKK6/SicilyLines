<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Bateau;
use Illuminate\Http\Request;

class BateauController extends Controller
{

    public function index()
    {
        $bateaux = Bateau::all();
        return view('index', ['bateaux' => $bateaux]);
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
        $bateau->details = $request->details;
        $bateau->save();

        return redirect()->route('bateaux.index');
    }


    public function show($id)
    {
        $bateau = Bateau::findOrFail($id);
        return view('bateaux.show', ['bateau' => $bateau]);
    }


    public function destroy($id)
    {
        $bateau = Bateau::findOrFail($id);
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


        $pdf = PDF::loadView('pdf_bateaux', $data);


        return $pdf->download('liste_bateaux.pdf');
    }
}
