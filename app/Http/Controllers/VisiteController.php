<?php

namespace App\Http\Controllers;

use App\Models\Visite;
use App\Models\Client;
use App\Models\Bien;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;
use Exception;

class VisiteController extends Controller
{
    use LogsActivity;

    // 🔹 Affichage de la page visite
    public function visite()
    {
        $visites = Visite::with(['client', 'bien'])
            ->orderBy('date_visite', 'desc')
            ->paginate(15);
        return view('visite', compact('visites'));
    }

    // 🔹 Page nouvelle visite
    public function nouvellevisite()
    {
        $clients = Client::select('id', 'nom_client', 'prenom_client')->get();
        $biens = Bien::select('id', 'type_bien', 'adresse_bien')->get();
        return view('nouvellevisite', compact('clients', 'biens'));
    }

    // 🔹 Ajout d'une nouvelle visite (formulaire général)
    public function ajoutervisite(Request $request)
    {
        try {
            // Validation avec messages personnalisés
            $validated = $request->validate([
                'nom_client' => 'required|string|max:255|regex:/^[a-zA-Zàâäçèéêëìîïòôöùûüœæ\s\'-]+$/',
                'prenom_client' => 'required|string|max:255|regex:/^[a-zA-Zàâäçèéêëìîïòôöùûüœæ\s\'-]+$/',
                'tel_client' => 'required|string|max:20|regex:/^[\d\s\+\-\(\)]+$/',
                'email_client' => 'required|email:rfc,dns|max:255',
                'budget_client' => 'required|numeric|min:0',
                'preferences' => 'nullable|string|max:1000',
                'bien_id' => 'required|exists:biens,id',
                'date_visite' => 'required|date|after_or_equal:today',
                'heure_visite' => 'required|date_format:H:i',
                'statut_visite' => 'required|in:Prévue,En attente,Confirmée,Complétée,Annulée',
                'montant_visite' => 'required|numeric|min:0',
                'moyen_paiement' => 'required|in:Espèces,Virement,Chèque,Carte bancaire,Autre'
            ], [
                'nom_client.regex' => 'Le nom doit contenir uniquement des lettres.',
                'prenom_client.regex' => 'Le prénom doit contenir uniquement des lettres.',
                'tel_client.regex' => 'Le téléphone n\'est pas valide.',
                'email_client.email' => 'L\'email doit être valide.',
                'date_visite.after_or_equal' => 'La date de visite doit être aujourd\'hui ou dans le futur.',
                'heure_visite.date_format' => 'L\'heure doit être au format HH:MM.',
            ]);

            // Vérifier si le bien existe
            $bien = Bien::findOrFail($validated['bien_id']);

            // Vérifier si le client existe déjà par tel_client
            $client = Client::firstOrCreate(
                ['tel_client' => $validated['tel_client']],
                [
                    'nom_client' => $validated['nom_client'],
                    'prenom_client' => $validated['prenom_client'],
                    'email_client' => $validated['email_client'],
                    'budget_client' => $validated['budget_client'],
                    'preferences' => $validated['preferences'],
                ]
            );

            // Mettre à jour les informations si le client existait
            if (!$client->wasRecentlyCreated) {
                $client->update([
                    'nom_client' => $validated['nom_client'],
                    'prenom_client' => $validated['prenom_client'],
                    'email_client' => $validated['email_client'],
                    'budget_client' => $validated['budget_client'],
                    'preferences' => $validated['preferences'],
                ]);
            }

            // Création visite
            $visite = Visite::create([
                'bien_id' => $validated['bien_id'],
                'client_id' => $client->id,
                'date_visite' => $validated['date_visite'],
                'heure_visite' => $validated['heure_visite'],
                'statut_visite' => $validated['statut_visite'],
                'montant_visite' => $validated['montant_visite'],
                'moyen_paiement' => $validated['moyen_paiement'],
            ]);

            $this->logActivity('Création visite', "Visite créée - Client: {$client->nom_client} {$client->prenom_client}, Bien: {$bien->adresse_bien}");

            return redirect()->route('visite.index')->with('success', 'Visite ajoutée avec succès.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.')->withInput();
        }
    }

    // 🔹 Ajout d'une visite depuis la page détail d’un bien
    public function enregistrerDepuisDetails(Request $request, $bien_id)
    {
        try {
            // Validation
            $request->validate([
                'nom_client' => 'required|string|max:255',
                'prenom_client' => 'required|string|max:255',
                'tel_client' => 'required|string|max:20',
                'email_client' => 'required|email|max:255',
                'budget_client' => 'required|numeric|min:0',
                'preferences' => 'nullable|string',
                'date_visite' => 'required|date',
                'heure_visite' => 'required',
                'statut_visite' => 'required|string|max:50',
                'montant_visite' => 'required|numeric',
                'moyen_paiement' => 'required|string|max:50'
            ]);

            // Vérifier si le client existe par téléphone
            $client = Client::where('tel_client', $request->tel_client)->first();

            if (!$client) {
                // Création client seulement s'il n'existe pas
                $client = Client::create([
                    'nom_client' => $request->nom_client,
                    'prenom_client' => $request->prenom_client,
                    'tel_client' => $request->tel_client,
                    'email_client' => $request->email_client,
                    'budget_client' => $request->budget_client,
                    'preferences' => $request->preferences,
                ]);
            } else {
                // Mettre à jour le client existant
                $client->update([
                    'nom_client' => $request->nom_client,
                    'prenom_client' => $request->prenom_client,
                    'email_client' => $request->email_client,
                    'budget_client' => $request->budget_client,
                    'preferences' => $request->preferences,
                ]);
            }

            // Création visite avec les données du formulaire
            Visite::create([
                'bien_id' => $bien_id,
                'client_id' => $client->id,
                'date_visite' => $request->date_visite,
                'heure_visite' => $request->heure_visite,
                'statut_visite' => $request->statut_visite,
                'montant_visite' => $request->montant_visite,
                'moyen_paiement' => $request->moyen_paiement,
            ]);

            $this->logActivity('Planification visite', "Visite planifiée pour le bien ID: $bien_id, montant: " . $request->montant_visite);

            return redirect()->route('bien.index')->with('success', 'Visite ajoutée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('bien.index')->with('error', 'Erreur : ' . $e->getMessage());
        }
    }

    // 🔹 Recherche Ajax
    public function rechercheAjax(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return response()->json([]);
        }

        $visites = Visite::with(['client', 'bien'])
            ->where('statut_visite', 'LIKE', "%{$query}%")
            ->orWhere('date_visite', 'LIKE', "%{$query}%")
            ->orWhereHas('client', function ($q) use ($query) {
                $q->where('nom_client', 'LIKE', "%{$query}%")
                  ->orWhere('prenom_client', 'LIKE', "%{$query}%");
            })
            ->limit(10)
            ->get();

        return response()->json($visites);
    }
    // 🔹 Ajout d'une visite depuis la page détail d’un bien
    public function enregistrerDepuisPublicDetails(Request $request, $bien_id)
    {
        try {
            // Validation
            $request->validate([
                'nom_client' => 'required|string|max:255',
                'prenom_client' => 'required|string|max:255',
                'tel_client' => 'required|string|max:20',
                'email_client' => 'required|email|max:255',
            'budget_client' => 'required|numeric|min:0',
            'preferences' => 'nullable|string',
            'date_visite' => 'required|date',
                'heure_visite' => 'required',
                'montant_visite' => 'required|numeric|min:0',
                'moyen_paiement' => 'required|string|max:50',
            ]);

        // Création client
            $client = Client::where('tel_client', $request->tel_client)->first();

            if (!$client) {
                $client = Client::create([
                    'nom_client' => $request->nom_client,
                    'prenom_client' => $request->prenom_client,
                    'tel_client' => $request->tel_client,
                    'email_client' => $request->email_client,
                    'budget_client' => $request->budget_client,
                    'preferences' => $request->preferences,
                ]);
            } else {
                $client->update([
                    'nom_client' => $request->nom_client,
                    'prenom_client' => $request->prenom_client,
                    'email_client' => $request->email_client,
                    'budget_client' => $request->budget_client,
                    'preferences' => $request->preferences,
                ]);
            }

            Visite::create([
                'bien_id' => $bien_id,
                'client_id' => $client->id,
                'date_visite' => $request->date_visite,
                'heure_visite' => $request->heure_visite,
                'statut_visite' => 'Prévue',
                'montant_visite' => $request->montant_visite,
                'moyen_paiement' => $request->moyen_paiement,
            ]);

            // Log activity if user is logged in
            if (auth()->check()) {
                $bien = Bien::find($bien_id);
                $this->logActivity('Planification visite', "Visite planifiée pour {$bien->adresse_bien}, montant: " . $request->montant_visite);
            }

        return redirect()->route('bien_details', $bien_id)->with('success', 'Visite planifiée avec succès ! Nous vous recontacterons bientôt.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            return redirect()->route('bien_details', $bien_id)->with('error', 'Une erreur est survenue. Veuillez réessayer.')->withInput();
        }
    }
}
