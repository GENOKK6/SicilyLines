<?php

namespace App\Http\Controllers;

use App\Models\Bateau;
use Illuminate\Http\Request;

class BateauController extends Controller
{

    public function index()
    {
        $bateaux = Bateau::all();
        return view('bateaux.index', ['bateaux' => $bateaux]);
    }


    public function create()
    {
        return view('bateaux.create');
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
}
