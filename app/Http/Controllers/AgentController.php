<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\agent;

class AgentController extends Controller
{
    //affichage de la page agent
    public function agent(){
        $agents = Agent::select('nom_agent', 'prenom_agent', 'tel_agent', 'email_agent', 'zone_affectation','type_agent')->get();
        return view('agent', compact('agents'));
    }
    //affichage de la page nouveau agent
    public function nouveauagent(){
        return view('nouveauagent');
    }
    //Ajout d'un nouveau agent
    public function ajouteragent(Request $request){
        $request->validate([
            'nom_agent' => 'required|string|max:255',
            'prenom_agent' => 'required|string|max:255',
            'tel_agent' => 'required|unique:agent,tel_agent|string|max:20',
            'email_agent' => 'required|unique:agent,email_agent|email|max:255',
            'zone_affectation' => 'required|string|max:500',
            'type_agent' => 'required|string|max:255',
        ]);
        //logique pour ajouter le agent dans la base de données
        Agent::create([
            'nom_agent' => $request->input('nom_agent'),
            'prenom_agent' => $request->input('prenom_agent'),
            'tel_agent' => $request->input('tel_agent'),
            'email_agent' => $request->input('email_agent'),
            'zone_affectation' => $request->input('zone_affectation'),
            'type_agent' => $request->input('type_agent'),
        ]);
        return redirect()->route('agent.index')->with('success', 'Agent ajouté avec succès.');
    }
    //fonction de recherche ajax
    public function rechercheAjax(Request $request){
        $query = $request->input('query');
        $agents = Agent::where('nom_agent', 'LIKE', "%$query%")
                        ->orWhere('prenom_agent', 'LIKE', "%$query%")
                        ->orWhere('tel_agent', 'LIKE', "%$query%")
                        ->orWhere('email_agent', 'LIKE', "%$query%")
                        ->orWhere('zone_affectation', 'LIKE', "%$query%")
                        ->orWhere('type_agent', 'LIKE', "%$query%")
                        ->get();
        return response()->json($agents);
    }

}
