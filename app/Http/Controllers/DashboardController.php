<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use App\Models\Client;
use App\Models\Bien;
use App\Models\Visite;
use App\Models\Agent;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
        // 📅 Définir les périodes
        $today = Carbon::today();
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();

        // 🧍‍♂️ Comptes totaux
        $totalProprietaires = Proprietaire::count();
        $totalClients = Client::count();
        $totalBiens = Bien::count();
        $totalVisites = Visite::count();
        $totalAgents = Agent::count();
        $totalTransactions = Transaction::count();

        // 📊 Comptes hebdomadaires
        $weeklyProprietaires = Proprietaire::whereBetween('created_at', [$weekStart, $weekEnd])->count();
        $weeklyClients = Client::whereBetween('created_at', [$weekStart, $weekEnd])->count();
        $weeklyBiens = Bien::whereBetween('created_at', [$weekStart, $weekEnd])->count();
        $weeklyVisites = Visite::whereBetween('created_at', [$weekStart, $weekEnd])->count();
        $weeklyAgents = Agent::whereBetween('created_at', [$weekStart, $weekEnd])->count();
        $weeklyTransactions = Transaction::whereBetween('created_at', [$weekStart, $weekEnd])->count();

        // 💰 Montant total des transactions
        $montantTotalTransactions = Transaction::sum('montant');
        $montantWeeklyTransactions = Transaction::whereBetween('created_at', [$weekStart, $weekEnd])->sum('montant');
        $montantMonthlyTransactions = Transaction::whereBetween('created_at', [$monthStart, $monthEnd])->sum('montant');

        // 📈 Pourcentages
        $percentProprietaires = $totalProprietaires > 0 ? round(($weeklyProprietaires / $totalProprietaires) * 100, 1) : 0;
        $percentClients = $totalClients > 0 ? round(($weeklyClients / $totalClients) * 100, 1) : 0;
        $percentBiens = $totalBiens > 0 ? round(($weeklyBiens / $totalBiens) * 100, 1) : 0;
        $percentVisites = $totalVisites > 0 ? round(($weeklyVisites / $totalVisites) * 100, 1) : 0;
        $percentAgents = $totalAgents > 0 ? round(($weeklyAgents / $totalAgents) * 100, 1) : 0;
        $percentTransactions = $totalTransactions > 0 ? round(($weeklyTransactions / $totalTransactions) * 100, 1) : 0;

        // 🔥 NOUVEAUTÉS

        // 📅 Visites du jour
        $visitesToday = Visite::whereDate('date_visite', $today)->with(['client', 'bien'])->get();

        // 📊 Dernières transactions
        $dernieresTransactions = Transaction::with(['client', 'bien'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // 🏆 Top 5 clients (par nombre de visites)
        $topClients = Client::withCount('visites')
            ->orderBy('visites_count', 'desc')
            ->limit(5)
            ->get();

        // 🏠 Biens les plus visités
        $biensPopulaires = Bien::withCount('visites')
            ->orderBy('visites_count', 'desc')
            ->limit(5)
            ->get();

        // 📈 Statistiques par statut de visite
        $visitesByStatut = Visite::select('statut_visite', DB::raw('count(*) as total'))
            ->groupBy('statut_visite')
            ->get();

        // 💳 Statistiques par moyen de paiement
        $transactionsByMoyenPaiement = Transaction::select('moyen_paiement', DB::raw('count(*) as total'), DB::raw('sum(montant) as montant_total'))
            ->groupBy('moyen_paiement')
            ->get();

        // 📤 Envoyer les données à la vue
        return view('dashboard', compact(
            'totalProprietaires',
            'totalClients',
            'totalBiens',
            'totalVisites',
            'totalAgents',
            'totalTransactions',
            'weeklyTransactions',
            'montantTotalTransactions',
            'montantWeeklyTransactions',
            'montantMonthlyTransactions',
            'percentProprietaires',
            'percentClients',
            'percentBiens',
            'percentVisites',
            'percentAgents',
            'percentTransactions',
            'visitesToday',
            'dernieresTransactions',
            'topClients',
            'biensPopulaires',
            'visitesByStatut',
            'transactionsByMoyenPaiement'
        ));
    }
}
