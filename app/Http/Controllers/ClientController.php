<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //affichage de la page client
    public function client(){
        $clients = Client::select('id','nom_client','prenom_client','tel_client', 'email_client','budget_client','preferences')->get();
        return view('client', compact('clients'));
    }
    //affichage de la page nouveau client
    public function nouveauclient(){
        return view('nouveauclient');
    }
    //Ajout d'un nouveau client
    public function ajouterclient(Request $request){
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'prenom_client' => 'required|string|max:255',
            'tel_client' => 'required|unique:client,tel_client|string|max:20',
            'email_client' => 'required|unique:client,email_client|email|max:255',
            'budget_client' => 'required|numeric|min:0',
            'preferences' => 'nullable|string',
        ]);
        \App\Models\Client::create([
            'nom_client' => $request->nom_client,
            'prenom_client' => $request->prenom_client,
            'tel_client' => $request->tel_client,
            'email_client' => $request->email_client,
            'budget_client' => $request->budget_client,
            'preferences' => $request->preferences,
        ]);
        return redirect()->route('client.index')->with('success', 'Client ajouté avec succès.');
    }
    //Recherche ajax des clients
    public function rechercheAjax(Request $request){
        $query = $request->input('query');
        $clients = Client::where('nom_client', 'LIKE', "%{$query}%")
            ->orWhere('prenom_client', 'LIKE', "%{$query}%")
            ->orWhere('tel_client', 'LIKE', "%{$query}%")
            ->orWhere('email_client', 'LIKE', "%{$query}%")
            ->get();
        return response()->json($clients);
    }
}
