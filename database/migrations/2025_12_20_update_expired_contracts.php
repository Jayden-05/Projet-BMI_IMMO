<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Mettre à jour tous les contrats expirés (date_fin dépassée) en statut "Expiré"
        DB::table('contrats')
            ->where('date_fin', '<', Carbon::now()->toDateString())
            ->where('statut_contrat', '!=', 'Expiré')
            ->update(['statut_contrat' => 'Expiré']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revenir au statut 'Actif' pour tous les contrats qui ont été marqués comme expirés
        // (Note: Ceci est une simplification. Dans un cas réel, il faudrait conserver l'état précédent)
        // DB::table('contrats')
        //     ->where('statut_contrat', 'Expiré')
        //     ->where('date_fin', '<', Carbon::now()->toDateString())
        //     ->update(['statut_contrat' => 'Actif']);
    }
};
