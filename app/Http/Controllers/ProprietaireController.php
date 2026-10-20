<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietaire;

class ProprietaireController extends Controller
{
    //affichage de la page proprietaire
    public function proprietaire(){
        $proprietaires = Proprietaire::select('nom_proprio', 'prenom_proprio', 'tel_proprio', 'email_proprio', 'adresse_proprio')->get();
        return view('proprietaire', compact('proprietaires'));
    }
    //affichage de la page nouveau proprietaire
    public function nouveauproprietaire(){
        return view('nouveauproprietaire');
    }
    //Ajout d'un nouveau proprietaire
    public function ajouterproprietaire(Request $request){
        $request->validate([
            'nom_proprio' => 'required|string|max:255',
            'prenom_proprio' => 'required|string|max:255',
            'tel_proprio' => 'required|unique:proprietaire,tel_proprio|string|max:20',
            'email_proprio' => 'required|unique:proprietaire,email_proprio|email|max:255',
            'adresse_proprio' => 'required|string|max:500',
        ]);
        //logique pour ajouter le proprietaire dans la base de données
        Proprietaire::create([
            'nom_proprio' => $request->input('nom_proprio'),
            'prenom_proprio' => $request->input('prenom_proprio'),
            'tel_proprio' => $request->input('tel_proprio'),
            'email_proprio' => $request->input('email_proprio'),
            'adresse_proprio' => $request->input('adresse_proprio'),
        ]);
        return redirect()->route('proprietaire.index')->with('success', 'Propriétaire ajouté avec succès.');
    }
    //Recherche ajax des proprietaires
    public function rechercheAjax(Request $request){
        $query = $request->input('query');
        $proprietaires = Proprietaire::where('nom_proprio', 'LIKE', "%{$query}%")
            ->orWhere('prenom_proprio', 'LIKE', "%{$query}%")
            ->orWhere('tel_proprio', 'LIKE', "%{$query}%")
            ->orWhere('email_proprio', 'LIKE', "%{$query}%")
            ->get();
        return response()->json($proprietaires);
    }
}
