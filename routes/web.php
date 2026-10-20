<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\BienPublicController;
use App\Http\Controllers\LogController;

/*
|--------------------------------------------------------------------------
| Routes publiques (NON protégées)
|--------------------------------------------------------------------------
*/

// Pages d'authentification (accessibles uniquement si NON connecté)
Route::middleware('guest')->group(function () {
    // Connexion
    Route::get('/authentification', [AuthentificationController::class, 'authentification'])->name('authentification');
    Route::get('/login', [AuthentificationController::class, 'authentification'])->name('login');
    Route::post('/login', [AuthentificationController::class, 'login'])->name('login.post');

    // Inscription
    Route::get('/register', [AuthentificationController::class, 'register'])->name('register');
    Route::post('/register', [AuthentificationController::class, 'registerPost'])->name('register.post');
});

// Routes publiques pour les visiteurs (accès aux biens)
Route::get('/', [BienPublicController::class, 'index'])->name('accueil');
Route::get('/bien_details/{id}', [BienPublicController::class, 'show'])->name('bien_details');
Route::post('/bien/{bien_id}/visite-public', [VisiteController::class, 'enregistrerDepuisPublicDetails'])->name('enregistrer.visite.public');

// Déconnexion - DOIT être accessible à tous (Client, Agent, Admin)
Route::post('/logout', [AuthentificationController::class, 'logout'])->name('logout')->middleware('auth');

// Journal d'activité pour les clients authentifiés
Route::get('/mon-activite', function () {
    $logs = \App\Models\ActivityLog::where('user_id', auth()->id())
        ->with('user')
        ->latest()
        ->paginate(50);
    return view('mon-activite.index', compact('logs'));
})->name('mon-activite.index')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Routes Admin (accès complet)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'check.admin'])->group(function () {
    // Propriétaires
    Route::get('/proprietaire', [ProprietaireController::class, 'proprietaire'])->name('proprietaire.index');
    Route::get('/nouveauproprietaire', [ProprietaireController::class, 'nouveauproprietaire'])->name('proprietaire.create');
    Route::post('/ajouterproprietaire', [ProprietaireController::class, 'ajouterproprietaire'])->name('proprietaire.store');

    // Agents
    Route::get('/agent', [AgentController::class, 'agent'])->name('agent.index');
    Route::get('/nouveau agent', [AgentController::class, 'nouveauagent'])->name('agent.create');
    Route::post('/ajouteragent', [AgentController::class, 'ajouteragent'])->name('agent.store');
    Route::get('/agent/recherche', [AgentController::class, 'rechercheAjax'])->name('agent.recherche');
});

/*
|--------------------------------------------------------------------------
| Routes protégées (Admin + Agent)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'check.agent'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Biens
    Route::get('/biens', [BienController::class, 'bien'])->name('bien.index');
    Route::get('/nouveaubien', [BienController::class, 'nouveaubien'])->name('bien.create');
    Route::post('/ajouterbien', [BienController::class, 'ajouterbien'])->name('bien.store');
    Route::get('/bien/recherche', [BienController::class, 'rechercheAjax'])->name('bien.recherche');
    Route::get('/bien/{id}/details', [BienController::class, 'details'])->name('details');
    Route::get('/bien/{id}/edit', [BienController::class, 'edit'])->name('bien.edit');
    Route::put('/bien/{id}', [BienController::class, 'update'])->name('bien.update');
    Route::delete('/bien/{id}', [BienController::class, 'destroy'])->name('bien.destroy');
    Route::delete('/bien/image/{id}', [BienController::class, 'deleteImage'])->name('bien.deleteImage');

    // Clients
    Route::get('/client', [ClientController::class, 'client'])->name('client.index');
    Route::get('/nouveauclient', [ClientController::class, 'nouveauclient'])->name('client.create');
    Route::post('/ajouterclient', [ClientController::class, 'ajouterclient'])->name('client.store');
    Route::get('/client/recherche', [ClientController::class, 'rechercheAjax'])->name('client.recherche');

    // Visites
    Route::get('/visite', [VisiteController::class, 'visite'])->name('visite.index');
    Route::get('/nouvellevisite', [VisiteController::class, 'nouvellevisite'])->name('visite.create');
    Route::post('/ajoutervisite', [VisiteController::class, 'ajoutervisite'])->name('visite.store');
    Route::get('/visite/recherche', [VisiteController::class, 'rechercheAjax'])->name('visite.recherche');
    Route::post('/bien/{id}/visite', [VisiteController::class, 'enregistrerDepuisDetails'])->name('enregistrer.visite');

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/payer/{visite}', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

    // Paiements
    Route::get('/paiements', [PaiementController::class, 'index'])->name('paiements.index');
    Route::get('/paiements/create/{transaction}', [PaiementController::class, 'create'])->name('paiements.create');
    Route::post('/paiements', [PaiementController::class, 'store'])->name('paiements.store');
    Route::get('/paiements/{paiement}/create-contract', [PaiementController::class, 'createMissingContract'])->name('paiements.createMissingContract');

    // Contrats
    Route::get('/contrats', [ContratController::class, 'index'])->name('contrats.index');
    Route::get('/contrats/create/{transaction}', [ContratController::class, 'create'])->name('contrats.create');
    Route::post('/contrats', [ContratController::class, 'store'])->name('contrats.store');
    Route::get('/contrats/{contrat}', [ContratController::class, 'show'])->name('contrats.show');
    Route::get('contrats/{contrat}/pdf', [ContratController::class, 'downloadPDF'])->name('contrats.pdf');

    // Activity Log pour Admin
    Route::get('/activity-log', function () {
        $logs = \App\Models\ActivityLog::with('user')->latest()->paginate(50);
        return view('activity-log.index', compact('logs'));
    })->name('activity-log.index')->middleware('check.admin');
});
Route::get('/logs/export/excel', [LogController::class, 'exportExcel'])->name('logs.export.excel');
Route::get('/logs/export/pdf', [LogController::class, 'exportPdf'])->name('logs.export.pdf');

/*
|--------------------------------------------------------------------------
| Route de redirection par défaut (404)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    abort(404);
});
