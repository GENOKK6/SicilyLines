<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bateau extends Model
{


    // C'est cette ligne qui corrige ton erreur :
    protected $table = 'bateaux';

    // On en profite pour autoriser le remplissage des champs (pour le formulaire)
    protected $fillable = [
        'nom',
        'longueur',
        'largeur',
        'equipements',
        'details',
        'image_url',
    ];
}
