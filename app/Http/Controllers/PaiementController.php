<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Contrat;
use App\Models\Transaction;
use App\Models\Piece;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaiementController extends Controller
{
    use LogsActivity;

    // Afficher le formulaire de paiement
    public function create($transactionId)
    {
        $transaction = Transaction::with(['client', 'bien'])->findOrFail($transactionId);
        return view('paiements.create', compact('transaction'));
    }

    // Enregistrer le paiement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'montant_loyer' => 'required|numeric|min:0.01',
            'type_paiement' => 'required|in:Location,Caution,Frais,Autre',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
            'moyen_paiement' => 'required|in:Espèces,Virement,Chèque,Carte bancaire,Autre',
            // Validation pour la pièce d'identité
            'numpiece' => 'required|string|unique:pieces,numpiece',
            'dateemission' => 'required|date|before_or_equal:today',
            'typepiece' => 'required|in:CNI,Passeport,Permis de conduire,Carte consulaire,Attestation identite',
            // Validation pour le contrat
            'type_contrat' => 'required|in:Location,Vente,Location-Vente',
            'caution' => 'nullable|numeric|min:0',
            'conditions' => 'nullable|string|max:5000',
        ], [
            'numpiece.unique' => 'Ce numéro de pièce existe déjà dans la base de données',
            'dateemission.before_or_equal' => 'La date d\'émission ne peut pas être dans le futur',
            'montant_loyer.min' => 'Le montant doit être supérieur à 0',
            'date_fin.after' => 'La date de fin doit être après la date de début',
        ]);

        try {
            $transaction = Transaction::findOrFail($validated['transaction_id']);

            // Enregistrer la pièce d'identité
            Piece::create([
                'numpiece' => $validated['numpiece'],
                'dateemission' => $validated['dateemission'],
                'typepiece' => $validated['typepiece'],
                'client_id' => $transaction->client_id,
            ]);

            // Enregistrer le paiement
            $paiement = Paiement::create([
                'transaction_id' => $transaction->id,
                'client_id' => $transaction->client_id,
                'bien_id' => $transaction->bien_id,
                'montant_loyer' => $validated['montant_loyer'],
                'type_paiement' => $validated['type_paiement'],
                'date_debut' => $validated['date_debut'],
                'date_fin' => $validated['date_fin'],
                'statut_paiement' => 'Payé',
                'moyen_paiement' => $validated['moyen_paiement'],
                'note' => $request->input('note'),
            ]);

            // Créer automatiquement le contrat
            $contrat = Contrat::create([
                'transaction_id' => $transaction->id,
                'client_id' => $transaction->client_id,
                'bien_id' => $transaction->bien_id,
                'numero_contrat' => 'CNT-' . strtoupper(Str::random(8)),
                'type_contrat' => $validated['type_contrat'],
                'date_contrat' => now()->format('Y-m-d'),
                'date_debut' => $validated['date_debut'],
                'date_fin' => $validated['date_fin'],
                'montant' => $validated['montant_loyer'],
                'caution' => $validated['caution'] ?? 0,
                'conditions' => $validated['conditions'],
                'statut' => 'Actif',
            ]);

            $this->logActivity('Enregistrement paiement', "Paiement enregistré - Montant: {$validated['montant_loyer']} FCFA, Client ID: {$transaction->client_id}");

            return redirect()->route('paiements.index')->with('success', 'Paiement et contrat enregistrés avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage())->withInput();
        }
    }

    // Liste des paiements
    public function index()
    {
        $paiements = Paiement::with([
            'client.pieces',
            'bien',
            'transaction' => function($query) {
                $query->with('contrat');
            }
        ])
        ->orderBy('created_at', 'desc')
        ->get();
        return view('paiements.index', compact('paiements'));
    }

    // Générer le contrat manquant pour un paiement
    public function createMissingContract($paiementId)
    {
        $paiement = Paiement::with('transaction')->findOrFail($paiementId);
        $transaction = $paiement->transaction;

        // Vérifier si un contrat existe déjà
        if ($transaction && $transaction->contrat) {
            return redirect()->route('paiements.index')
                ->with('info', 'Un contrat existe déjà pour ce paiement.');
        }

        try {
            // Créer le contrat
            $contrat = Contrat::create([
                'transaction_id' => $transaction->id,
                'client_id' => $paiement->client_id,
                'bien_id' => $paiement->bien_id,
                'numero_contrat' => 'CNT-' . strtoupper(Str::random(8)),
                'type_contrat' => 'Location résidentielle',
                'date_contrat' => now()->format('Y-m-d'),
                'date_debut' => $paiement->date_debut,
                'date_fin' => $paiement->date_fin,
                'montant_loyer' => $paiement->montant_loyer,
                'caution' => null,
                'conditions' => 'Contrat généré rétroactivement',
                'statut_contrat' => 'Actif',
            ]);

            return redirect()->route('contrats.show', $contrat->id)
                ->with('success', 'Contrat généré avec succès!');
        } catch (\Exception $e) {
            return redirect()->route('paiements.index')
                ->with('error', 'Erreur lors de la création du contrat: ' . $e->getMessage());
        }
    }
}

