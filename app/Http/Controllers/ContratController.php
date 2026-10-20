<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class ContratController extends Controller
{
    // Afficher le formulaire de création
    public function create($transactionId)
    {
        $transaction = Transaction::with(['client', 'bien'])->findOrFail($transactionId);
        return view('contrats.create', compact('transaction'));
    }

    // Enregistrer le contrat
    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'type_contrat' => 'required|string',
            'date_contrat' => 'required|date',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'montant_loyer' => 'required|numeric',
            'caution' => 'nullable|numeric',
        ]);

        $transaction = Transaction::findOrFail($request->transaction_id);

        $contrat = Contrat::create([
            'transaction_id' => $transaction->id,
            'client_id' => $transaction->client_id,
            'bien_id' => $transaction->bien_id,
            'numero_contrat' => 'CNT-' . strtoupper(Str::random(8)),
            'type_contrat' => $request->type_contrat,
            'date_contrat' => $request->date_contrat,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'montant_loyer' => $request->montant_loyer,
            'caution' => $request->caution,
            'conditions' => $request->conditions,
            'statut_contrat' => 'Actif',
        ]);

        return redirect()->route('contrats.show', $contrat->id)->with('success', 'Contrat créé avec succès!');
    }

    // Afficher un contrat
    public function show($id)
    {
        $contrat = Contrat::with(['client', 'bien', 'transaction'])->findOrFail($id);

        // Mettre à jour le statut si le contrat est expiré
        $contrat->updateStatusIfExpired();

        return view('contrats.show', compact('contrat'));
    }

    // Liste de tous les contrats
    public function index()
    {
        $contrats = Contrat::with(['client', 'bien', 'transaction'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Mettre à jour le statut des contrats expirés
        foreach ($contrats as $contrat) {
            $contrat->updateStatusIfExpired();
        }

        return view('contrats.index', compact('contrats'));
    }
public function downloadPDF($id)
{
    $contrat = Contrat::with(['client', 'bien'])->findOrFail($id);

    $pdf = Pdf::loadView('contrats.pdf_clean', compact('contrat'))
              ->setPaper('A4', 'portrait');

    return $pdf->download("Contrat_{$contrat->numero_contrat}.pdf");
}
}
