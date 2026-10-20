<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;

class BienPublicController extends Controller
{
    use LogsActivity;

    public function index(Request $request)
    {
        $query = Bien::with('mainImage');

        // 🔎 Filtres
        if ($request->filled('type_bien')) {
            $query->where('type_bien', $request->type_bien);
        }

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        if ($request->filled('prix_min')) {
            $query->where('prix', '>=', $request->prix_min);
        }

        if ($request->filled('prix_max')) {
            $query->where('prix', '<=', $request->prix_max);
        }

        if ($request->filled('superficie_min')) {
            $query->where('superficie', '>=', $request->superficie_min);
        }

        if ($request->filled('superficie_max')) {
            $query->where('superficie', '<=', $request->superficie_max);
        }

        if ($request->filled('adresse')) {
            $query->where('adresse_bien', 'LIKE', '%' . $request->adresse . '%');
        }

        // Pagination
        $biens = $query->paginate(9)->appends($request->query());

        // Pour remplir les filtres dynamiquement
        $types = Bien::select('type_bien')->distinct()->get();
        $statuts = Bien::select('statut')->distinct()->get();

        return view('public.biens', compact('biens', 'types', 'statuts'));
    }
    public function show($id)
    {
        $bien = \App\Models\Bien::with(['images', 'proprietaire'])->findOrFail($id);

        // Log activity for logged-in clients/users
        if (auth()->check()) {
            $this->logActivity('Consultation bien', "Consultation du bien: {$bien->adresse_bien}");
        }

        return view('public.bien_details', compact('bien'));
    }

}
