<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    // Afficher la page de paiement
    public function create($visiteId)
    {
        $visite = Visite::with(['client', 'bien'])->findOrFail($visiteId);

        // Vérifier si la visite a déjà une transaction payée
        $transactionExistante = Transaction::where('visite_id', $visiteId)
            ->where('statut_transaction', 'Payé')
            ->first();

        if ($transactionExistante) {
            return redirect()->back()->with('error', 'Cette visite a déjà été payée.');
        }

        return view('transactions.create', compact('visite'));
    }

    // Enregistrer le paiement
    public function store(Request $request)
    {
        $request->validate([
            'visite_id' => 'required|exists:visite,id',
            'moyen_paiement' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $visite = Visite::findOrFail($request->visite_id);

        // Créer la transaction
        $transaction = Transaction::create([
            'visite_id' => $visite->id,
            'client_id' => $visite->client_id,
            'bien_id' => $visite->bien_id,
            'montant' => $visite->montant_visite,
            'moyen_paiement' => $request->moyen_paiement,
            'statut_transaction' => 'Payé',
            'reference_transaction' => 'TRX-' . strtoupper(Str::random(10)),
            'date_transaction' => now()->toDateString(),
            'note' => $request->note,
        ]);

        // Mettre à jour le statut de la visite
        $visite->update(['statut_visite' => 'Payée']);

        return redirect()->route('visite.index')->with('success', 'Paiement effectué avec succès!');
    }

    // Liste des transactions
    public function index()
    {
        $transactions = Transaction::with(['visite', 'client', 'bien'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('transactions.index', compact('transactions'));
    }
}
