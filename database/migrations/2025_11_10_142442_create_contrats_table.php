<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id(); // id_contrat
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('client')->onDelete('cascade'); // id_client
            $table->foreignId('bien_id')->constrained('bien')->onDelete('cascade'); // id_bien
            $table->string('numero_contrat')->unique();
            $table->string('type_contrat'); // Location, Vente, Bail commercial
            $table->date('date_contrat'); // date_contrat
            $table->date('date_debut');
            $table->date('date_fin');
            $table->decimal('montant_loyer', 10, 2);
            $table->decimal('caution', 10, 2)->nullable();
            $table->text('conditions')->nullable();
            $table->string('statut_contrat')->default('Actif'); // Actif, Résilié, Expiré
            $table->string('fichier_contrat')->nullable(); // PDF du contrat
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contrats');
    }
};
