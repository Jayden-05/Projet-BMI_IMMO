<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\BienImage;
use App\Models\Client;
use App\Models\Proprietaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BienController extends Controller
{
    // ✅ Affichage de la liste des biens
    public function bien()
    {
        $biens = Bien::select('id', 'type_bien', 'slug', 'adresse_bien', 'superficie', 'prix', 'statut', 'description', 'id_proprio')
            ->with(['proprietaire', 'mainImage']) // 🔹 Charger l'image principale
            ->get();

        return view('bien', compact('biens'));
    }

    // ✅ Formulaire pour ajouter un nouveau bien
    public function nouveaubien()
    {
        $proprietaires = Proprietaire::select('id', 'nom_proprio', 'prenom_proprio', 'tel_proprio')->get();
        return view('nouveaubien', compact('proprietaires'));
    }

    // ✅ Enregistrement du bien dans la base
    public function ajouterbien(Request $request)
    {
        $validatedData = $request->validate([
            'type_bien' => 'required|string|max:255',
            'adresse_bien' => 'required|string|max:255',
            'superficie' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
            'statut' => 'required|string|max:50',
            'description' => 'nullable|string',
            'id_proprio' => 'required|exists:proprietaire,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // 🔹 Validation des images
        ]);

        // Créer le bien
        $bien = Bien::create([
            'type_bien' => $validatedData['type_bien'],
            'adresse_bien' => $validatedData['adresse_bien'],
            'superficie' => $validatedData['superficie'],
            'prix' => $validatedData['prix'],
            'statut' => $validatedData['statut'],
            'description' => $validatedData['description'] ?? null,
            'id_proprio' => $validatedData['id_proprio'],
        ]);

        // 🔹 Uploader les images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('biens', 'public');

                BienImage::create([
                    'bien_id' => $bien->id,
                    'image_path' => $path,
                    'is_main' => $index === 0 // La première image est l'image principale
                ]);
            }
        }

        return redirect()->route('bien.index')->with('success', 'Bien ajouté avec succès.');
    }

    // ✅ Recherche AJAX
    public function rechercheAjax(Request $request)
    {
        $query = $request->input('query');
        $biens = Bien::where('type_bien', 'LIKE', "%{$query}%")
            ->orWhere('adresse_bien', 'LIKE', "%{$query}%")
            ->orWhere('statut', 'LIKE', "%{$query}%")
            ->with('mainImage') // 🔹 Charger l'image principale
            ->get();

        return response()->json($biens);
    }

    public function details($id)
{
    $bien = Bien::with(['proprietaire', 'images'])->findOrFail($id);
    $clients = Client::select('id', 'nom_client', 'prenom_client')->get();

    return view('details', compact('bien', 'clients'));
}
    // ✅ Page de modification
    public function edit($id)
    {
        $bien = Bien::with('images')->where('id', $id)->firstOrFail();
        $proprietaires = Proprietaire::select('id', 'nom_proprio', 'prenom_proprio')->get();
        return view('editbien', compact('bien', 'proprietaires'));
    }

    // ✅ Mise à jour d'un bien
    public function update(Request $request, $id)
    {
        $bien = Bien::where('id', $id)->firstOrFail();

        $validatedData = $request->validate([
            'type_bien' => 'required|string|max:255',
            'adresse_bien' => 'required|string|max:255',
            'superficie' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
            'statut' => 'required|string|max:50',
            'description' => 'nullable|string',
            'id_proprio' => 'required|exists:proprietaire,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'delete_images' => 'nullable|array' // 🔹 Pour supprimer des images
        ]);

        $bien->update($validatedData);

        // 🔹 Supprimer les images sélectionnées
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = BienImage::find($imageId);
                if ($image && $image->bien_id == $bien->id) {
                    Storage::disk('public')->delete($image->image_path);
                    $image->delete();
                }
            }
        }

        // 🔹 Ajouter de nouvelles images
        if ($request->hasFile('images')) {
            // Vérifier s'il y a déjà une image principale
            $hasMainImage = $bien->images()->where('is_main', true)->exists();

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('biens', 'public');

                BienImage::create([
                    'bien_id' => $bien->id,
                    'image_path' => $path,
                    'is_main' => !$hasMainImage && $index === 0
                ]);
            }
        }

        return redirect()->route('bien.index')->with('success', 'Bien modifié avec succès !');
    }

    // 🔹 NOUVELLE MÉTHODE : Supprimer une image
    public function deleteImage($id)
    {
        $image = BienImage::findOrFail($id);
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Image supprimée avec succès !');
    }

    public function destroy($id)
    {
        $bien = Bien::findOrFail($id);
        $bien->delete();

        return redirect()->route('bien.index')
                     ->with('success', 'Bien supprimé avec succès');
    }
}


